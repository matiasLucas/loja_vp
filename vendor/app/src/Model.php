<?php

namespace Hcode;

//Classe para fazer getters e setters das requisições
class Model {

    private $values = [];

    //Chama o get e o set
    public function __call($name, $args)
    {

        $method = substr($name, 0, 3);
        $fieldName = substr($name, 3, strlen($name));

        switch ($method)
        {

            case "get":
               return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL;
            break;

            case "set":
                $this->values[$fieldName] = $args[0];
            break;
        }
    }

    //Percorre os dados do banco e cria os atributos
    public function setData($data = array())
    {
         
        foreach($data as $key => $value) {

            $this->{"set".$key}($value);

        } 
    }

    //Retorna os valores
    public function getValues()
    {
        return $this->values;
 
    }

}

?>