<?php

use \Hcode\Page;
use \Hcode\Model\User;
use \Hcode\Model\Category;

//Rota pagina inicial
$app->get('/', function() {
        
    $page = new Page();

    $page->setTpl("index");

});

$app->get("/category/:id", function($id){

    $category = new Category();

    $category->get((int)$id);

    $page = new Page();

    $page->setTpl("category", [
        'category'=>$category->getValues()
    ]);

});

?>