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
        
        $result = $sql->select("SELECT * FROM tb_products ORDER BY idproduct");

        return $result;
      }

      //Força cada item da lista a passar pelo getValues e setData
      public static function checkList($list)
      {
  
          foreach ($list as &$row) {
  
              $p = new Products();
              $p->setData($row);
              $row = $p->getValues();
  
          }
  
          return $list;
  
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
        
        $results = $sql->select("UPDATE tb_products SET name = :name WHERE idproduct = :idproduct",
        array(
           ":idproduct"=>$this->getidproduct(), 
           ":name"=>$this->getname()
        ));
     }

    //Lista 1 produto específico
    public function get($idproduct){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_products WHERE idproduct = :idproduct",
        array(
           ":idproduct"=>$idproduct
        ));

        $data = $results[0];

        //$data["name"] = utf8_encode($data["name"]);

        $this->setData($results[0]);           
    }

    //Deleta o produto no banco
    public function delete()
    {                        
        $sql = new Sql();

        $sql->query("DELETE FROM tb_products WHERE idproduct = :idproduct", array(
           ":idproduct"=>$this->getidproduct()
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
         $this->getidproduct() . ".jpg"
         )) {      

            $url = "/res/site/images/products/" . $this->getidproduct() . ".jpg";


         } else {

            $url = "/res/site/images/product.jpg";
           
         }
         return $this->setimage($url);     

    }

    //Método getValues sobreescrito para pegar o valor da imagem do produto
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
        $this->getidproduct() . ".jpg";

        imagejpeg($image, $dist);

        imagedestroy($image);

        $this->checkPhoto();

    }


}

?>