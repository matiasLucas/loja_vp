<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;

//Rota pagina admin
$app->get('/admin', function() {
    
    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("index");

});

//Rota pagina login admin
$app->get('/admin/login', function() {

    $page = new PageAdmin([
        "header"=>false,
        "footer"=>false
    ]);

    $page->setTpl("login", [
        'error'=>User::getError()
    ]);

});

//Submit da pagina de login admin
$app->post('/admin/login', function(){

    try {
        User::login($_POST["login"], $_POST["password"]);
    } catch(\Exception $e){
        User::setError($e->getMessage());
    }

    header("Location: /admin");
    exit;

});

//Rota de logout
$app->get('/admin/logout', function(){

    User::logout();

    header("Location: /admin/login");
    exit;

});



?>