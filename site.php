<?php

use \Hcode\Page;
use \Hcode\Model\User;
use \Hcode\Model\Category;
use \Hcode\Model\Products;

//Rota pagina inicial
$app->get('/', function() {
        
    $category = Category::listAll();

    $page = new Page();

    $page->setTpl("index", [
        'category'=>Category::checkList($category)
    ]);

});

//Tela de produtos por categoria
$app->get("/category/:idcategory", function($idcategory){

    $category = new Category();

    $category->get((int)$idcategory);

    $page = new Page();

    $page->setTpl("category", [
        'category'=>$category->getValues(),  
		'products'=>$category->getProducts()
    ]);

});

?>