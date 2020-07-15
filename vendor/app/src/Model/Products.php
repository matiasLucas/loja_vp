<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

//Classe da entidade Produtos
class Products extends Model {

    //Lista todos as produtos
    public static function listAll()
    {
        $sql = new Sql();
        
        $result = $sql->select("SELECT * FROM tb_products ORDER BY id");

        return $result;
      }

    //Cadastra nova produto
    public function save()
    {
        $sql = new Sql();

        $results = $sql->select("INSERT INTO tb_products(name, price) VALUES(:name, :price)",
        array(
            ":name"=>$this->getname(),             
            ":price"=>$this->getprice(), 
        )); 
    }

     //Cadastra nova produto
     public function update()
     {    
        $sql = new Sql();
        
        $results = $sql->select("UPDATE tb_products SET name = :name WHERE id = :id",
        array(
           ":id"=>$this->getid(), 
           ":name"=>$this->getname()
        ));
     }

    //Lista 1 produto específico
    public function get($id){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_products WHERE id = :id",
        array(
           ":id"=>$id
        ));

        $data = $results[0];

        //$data["name"] = utf8_encode($data["name"]);

        $this->setData($results[0]);           
    }

    //Deleta o produto no banco
    public function delete()
    {                        
        $sql = new Sql();

        $sql->query("DELETE FROM tb_products WHERE id = :id", array(
           ":id"=>$this->getid()
           ));
    }

    //Verifica se o produto contém imagem
    public function checkPhoto()
    {
        if (file_exists(
        $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
         "res" . DIRECTORY_SEPARATOR .
         "site" . DIRECTORY_SEPARATOR .
         "images" . DIRECTORY_SEPARATOR .
         "products" . DIRECTORY_SEPARATOR .
         $this->getid() . ".jpg"
         )) {      

            $url = "/res/site/images/products/" . $this->getid() . ".jpg";


         } else {

            $url = "/res/site/images/product.jpg";
           
         }
         return $this->setimage($url);     

    }

    //Método getVallues sobreescrito para pegar o valor da imagem do produto
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
        "products" . DIRECTORY_SEPARATOR .
        $this->getid() . ".jpg";

        imagejpeg($image, $dist);

        imagedestroy($image);

        $this->checkPhoto();

    }


}

?>