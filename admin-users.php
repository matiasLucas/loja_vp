<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;

//Chama a tela de usuários e lista todos
$app->get('/admin/users', function(){
    
    User::verifyLogin();

    $users = User::listAll();

    $page = new PageAdmin();
    

    $page->setTpl("/admin/users", array(
        "users"=>$users
    ));

});

//Chama a tela de cadastro de usuários
$app->get('/admin/users/create', function(){
    
    User::verifyLogin();
    
    $page = new PageAdmin();

    $page->setTpl("/admin/users-create");

});

//Cadastra o usuario
$app->post('/admin/users/create', function(){

    User::verifyLogin();

    $user = new User();

    //Se o campo "admin" for vazio é colocado = 0
    $_POST["admin"] = (isset($_POST["admin"]))?1:0;

    //Cripitografia hash da senha cadastrada
    $_POST['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT, [

        "cost"=>12

    ]);

    $user->setData($_POST); 

    $user->save();

    header("Location: /admin/users");
    exit;

});

?>