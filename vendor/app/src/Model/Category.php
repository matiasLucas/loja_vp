<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

//Classe da entidade Categoria
class Category extends Model {

    //Lista todos as categorias
    public static function listAll()
    {
        $sql = new Sql();
        
        $result = $sql->select("SELECT * FROM tb_categories ORDER BY idcategory");

        return $result;
    }

    //Força cada item da lista a passar pelo getValues e setData
    public static function checkList($list)
    {

        foreach ($list as &$row) {

            $p = new Category();
            $p->setData($row);
            $row = $p->getValues();

        }

        return $list;

    }


    //Cadastra nova categoria
    public function save()
    {
        $sql = new Sql();

        $results = $sql->select("INSERT INTO tb_categories(name) VALUES(:name)",
        array(
            ":name"=>$this->getname(), 
        ));

        Category::updateFile();

    }

     //Edita categoria
     public function update()
     {    
        $sql = new Sql();
        
        $results = $sql->select("UPDATE tb_categories SET name = :name WHERE idcategory = :idcategory",
        array(
           ":idcategory"=>$this->getidcategory(), 
           ":name"=>$this->getname()
        ));    

        Category::updateFile();

     }

    //Lista 1 categoria específica
    public function get($idcategory)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory",
        array(
           ":idcategory"=>$idcategory
        ));

        $data = $results[0];

        //$data["name"] = utf8_encode($data["name"]);

        $this->setData($results[0]);           
    }

    //Deleta a categoria no banco
    public function delete()
    {                        
        $sql = new Sql();

        $sql->query("DELETE FROM tb_categories WHERE idcategory= :idcategory", array(
           ":idcategory"=>$this->getidcategory()
           ));

        Category::updateFile();
           
    }

    //Atualiza dinamicamente as categorias na pagina inicial
    static function updateFile()
    {
        $categories = Category::listAll();

        $html = [];

        foreach ($categories as $row) {
            array_push($html, '<li><a href="/category/'.$row['idcategory'].'">'.$row['name'].'</a></li>');
        }

        //salva arquivo
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . "categories-menu.html", implode('', $html));

    }

    //Verifica se a categoria contém imagem
    public function checkPhoto()
    {           
        if (file_exists(
        $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
        "res" . DIRECTORY_SEPARATOR .
        "site" . DIRECTORY_SEPARATOR .
        "images" . DIRECTORY_SEPARATOR .
        "categories" . DIRECTORY_SEPARATOR .
        $this->getidcategory() . ".jpg"
        )) {      

            $url = "/res/site/images/categories/" . $this->getidcategory() . ".jpg";            

        } else {
            
            $url = "/res/site/images/product.jpg";
            
        }

        return $this->setimage($url);  

    }

    //Método getVallues sobreescrito para pegar o valor da imagem da categoria
    public function getValues()
    {

        $this->checkPhoto();

        $values = parent::getValues();        

        return $values;

    }

    //Converte imagem para jpg e salva no diretório
    public function setPhoto($file)
    {
        
        $extension = explode('.', $file['name']);
        $extension = end($extension);

        switch ($extension) {

            case "jpg";
            case "jpeg";
            $image = imagecreatefromjpeg($file["tmp_name"]);
            break;

            case "gif";
            $image = imagecreatefromgif($file["tmp_name"]);
            break;

            case "png";
            $image = imagecreatefrompng($file["tmp_name"]);
            break;

        }

        $dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
        "res" . DIRECTORY_SEPARATOR .
        "site" . DIRECTORY_SEPARATOR .
        "images" . DIRECTORY_SEPARATOR .
        "categories" . DIRECTORY_SEPARATOR .
        $this->getidcategory() . ".jpg";

        imagejpeg($image, $dist);

        imagedestroy($image);
           
        $this->checkPhoto();  

    }
  
    //Seleciona os produtos relacionados e não relacionados com a categoria
    public function getProducts($related = true)
    {

        $sql = new Sql();

        if($related === true) {

            return $sql->select("
            SELECT * FROM tb_products WHERE idproduct IN ( 
                SELECT a.idproduct 
                FROM tb_products a  
                INNER JOIN tb_categoriesproducts b ON a.idproduct= b.idproduct  
                WHERE b.idcategory = :idcategory 
            );
            ", [
                ':idcategory'=>$this->getidcategory()

            ]);

        } else {
            return $sql->select("
            SELECT * FROM tb_products WHERE idproduct NOT IN ( 
                SELECT a.idproduct 
                FROM tb_products a  
                INNER JOIN tb_categoriesproducts b ON a.idproduct= b.idproduct  
                WHERE b.idcategory = :idcategory
            );
            ", [
                ':idcategory'=>$this->getidcategory()

            ]);
        }
    }
  
    //Adiciona o produto na categoria   
    public function addProduct(Products $product)
    {
        $sql = new Sql();

        $sql->query("INSERT INTO tb_categoriesproducts (idcategory, idproduct) VALUES(:idcategory,:idproduct)", [
            ':idcategory'=>$this->getidcategory(),
            ':idproduct'=>$product->getidproduct()
        ]);        

    }

    //Remove o produto da categoria
    public function removeProduct(Products $product)
    {
        $sql = new Sql();

        $sql->query("DELETE FROM tb_categoriesproducts WHERE idcategory = :idcategory AND idproduct = :idproduct", [
            ':idcategory'=>$this->getidcategory(),
            ':idproduct'=>$product->getidproduct()
        ]);
    }

}

?>