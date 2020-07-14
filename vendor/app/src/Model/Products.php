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

        $results = $sql->select("INSERT INTO tb_products(name, image, price) VALUES(:name, :image, :price)",
        array(
            ":name"=>$this->getname(), 
            ":image"=>$this->getimage(), 
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

}

?>