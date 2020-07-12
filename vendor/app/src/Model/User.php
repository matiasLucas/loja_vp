<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

//Classe da entidade usuario
class User extends Model {

    const SESSION = "User";


    public static function getFromSession()
    {
        $user = new User();

		if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['id'] > 0) {
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
            !(int)$_SESSION[User::SESSION]["id"] > 0
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
            throw new \Exception("Usuário inexistente ou senha inválida.");
        }

        $data = $results[0];
        
        if (password_verify($password, $data['password']) === true)
        {
            
            $user = new User();   
            
            $user->setdata($data);

            $_SESSION[User::SESSION] = $user->getValues();

            return $user;

        } else {
            throw new \Exception("Usuário inexistente ou senha inválida.");
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

    public static function logout()
    {
        
        $_SESSION[User::SESSION] = NULL;   

    }

    
    public static function listAll()
    {
        $sql = new Sql();
        
        $result = $sql->select("SELECT * FROM tb_user ORDER BY id");

        return $result;
      }

    public function save()
    {
        
    }
    
}

?>