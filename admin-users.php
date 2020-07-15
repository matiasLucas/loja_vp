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

    $user->setData($_POST); 

    $user->save();

    header("Location: /admin/users");
    exit;

});

//Pagina de editar usuário
$app->get("/admin/users/:iduser", function($iduser) {

    User::verifyLogin();

    $user = new User();

	$user->get((int)$iduser);

    $page = new PageAdmin();

    $page->setTpl("/admin/users-update",array(
        "user"=>$user->getValues()
    ));

});

//Submit do editar usuário
$app->post("/admin/users/:iduser", function($iduser) {

	User::verifyLogin();

	$user = new User();
	
    $_POST["admin"] = (isset($_POST["admin"]))?1:0;
    
    $user->get((int)$iduser);  
    
    $user->setData($_POST);    
	
	$user->update();

	header("Location: /admin/users");
	exit;
});

//Deleta usuário selecionado
$app->get("/admin/users/:iduser/delete", function($iduser) {

    User::verifyLogin();

    $user = new User();

	$user->get((int)$iduser);

	$user->delete();

	header("Location: /admin/users");
	exit;

});

?>