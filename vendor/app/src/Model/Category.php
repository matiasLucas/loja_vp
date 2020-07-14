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
        
        $result = $sql->select("SELECT * FROM tb_categories ORDER BY id");

        return $result;
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
        
        $results = $sql->select("UPDATE tb_categories SET name = :name WHERE id = :id",
        array(
           ":id"=>$this->getid(), 
           ":name"=>$this->getname()
        ));    

        Category::updateFile();

     }

    //Lista 1 categoria específica
    public function get($id)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_categories WHERE id = :id",
        array(
           ":id"=>$id
        ));

        $data = $results[0];

        //$data["name"] = utf8_encode($data["name"]);

        $this->setData($results[0]);           
    }

    //Deleta a categoria no banco
    public function delete()
    {                        
        $sql = new Sql();

        $sql->query("DELETE FROM tb_categories WHERE id = :id", array(
           ":id"=>$this->getid()
           ));

        Category::updateFile();
           
    }

    //Atualiza dinamicamente as categorias na pagina inicial
    static function updateFile()
    {
        $categories = Category::listAll();

        $html = [];

        foreach ($categories as $row) {
            array_push($html, '<li><a href="/category/'.$row['id'].'">'.$row['name'].'</a></li>');
        }

        //salva arquivo
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR . "categories-menu.html", implode('', $html));

    }

}

?>