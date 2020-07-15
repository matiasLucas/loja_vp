<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

//Classe da entiduserade usuario
class User extends Model {

    const SESSION = "User";


    public static function getFromSession()
    {
        $user = new User();

		if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 0) {
			$user->setData($_SESSION[User::SESSION]);
		}
		return $user;
    }

    //Verifica se a sessão está ativa
    public static function checkLogin($inadmin = true)
    {
        if ( 
            !isset($_SESSION[User::SESSION])
            ||
            !$_SESSION[User::SESSION]
            ||
            !(int)$_SESSION[User::SESSION]["iduser"] > 0
         ) {
             //Não está logado
             return false;

         } else {

            if ($inadmin === true && (bool)$_SESSION[User::SESSION]['admin'] === true) {

                return true;    

            } else if ($inadmin === false) {
 
                return true;

            } else {
                
                return false;
            }
         }
    }


    //Função que verifica o login e a senha descriptografada no banco
    public static function login($login, $password)
    {    
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_user WHERE name = :LOGIN", array(
            ":LOGIN"=>$login        
        ));

        if (count($results) === 0)
        {    
            throw new \Exception("Usuário inexistente ou senha inválidusera.");
        }

        $data = $results[0];
        
        if (password_verify($password, $data['password']) === true)
        {
            
            $user = new User();   
            
            $user->setdata($data);

            $_SESSION[User::SESSION] = $user->getValues();

            return $user;

        } else {

            throw new \Exception("Usuário inexistente ou senha inválidusera.");

        }

    }
    
    //Verifica se usuario está logado como admin ou como usuario normal
    public static function verifyLogin($inadmin = true)
    {
        $isLogged = User::checkLogin($inadmin);

        if ($isLogged === false) {

            if ($inadmin) {
                header("Location: /admin/login");
            } else {
                header("Location: /login");
            }            
           
           exit;

        }
    }

    //Encerra sessão do usuário
    public static function logout()
    {
        
        $_SESSION[User::SESSION] = NULL;   

    }

    //Lista todos os usuários
    public static function listAll()
    {
        $sql = new Sql();
        
        $result = $sql->select("SELECT * FROM tb_user ORDER BY iduser");

        return $result;
      }

    //Cadastra novo usuário
    public function save()
    {
        $sql = new Sql();

        $results = $sql->select("INSERT INTO tb_user(name,password,admin) VALUES(:name, :password, :admin)",
        array(
            ":name"=>$this->getname(), 
            ":password"=>User::getPasswordHash($this->getpassword()),
            ":admin"=>$this->getadmin()
        ));

    }

     //Cadastra novo usuário
     public function update()
     {
         $sql = new Sql();
        
         $results = $sql->select("UPDATE tb_user SET name = :name, password = :password, admin = :admin WHERE iduser = :iduser",
         array(
            ":iduser"=>$this->getiduser(), 
            ":name"=>$this->getname(), 
            ":password"=>User::getPasswordHash($this->getpassword()),
            ":admin"=>$this->getadmin()
         ));
     }

    public static function getPasswordHash($password)
    {    

        return password_hash($password, PASSWORD_DEFAULT);

    }
     
    //Lista 1 usuário específico
    public function get($iduser){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_user WHERE iduser = :iduser",
        array(
           ":iduser"=>$iduser
        ));

        $data = $results[0];

        //$data["name"] = utf8_encode($data["name"]);

        $this->setData($results[0]);           
    }


    public function delete()
    {                        
        $sql = new Sql();

        $sql->query("DELETE FROM tb_user WHERE iduser = :iduser", array(
           ":iduser"=>$this->getiduser()
           ));
    }

}

?>