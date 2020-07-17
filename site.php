<?php

use \Hcode\Page;
use \Hcode\Model\User;
use \Hcode\Model\Category;
use \Hcode\Model\Products;
use \Hcode\Model\Cart;

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

$app->get("/products/:idproduct", function($idproduct){

    $product = new Products();

	$product->get($idproduct);

	$page = new Page();

	$page->setTpl("product-detail", [
		'product'=>$product->getValues(),
		'categories'=>$product->getCategories()
	]);


});

$app->get("/cart", function(){    

    $cart = Cart::getFromSession();

    $page = new Page();

    $page->setTpl("cart", [
		'cart'=>$cart->getValues(),
		'products'=>$cart->getProducts(),
		'error'=>Cart::getMsgError()
	]);

});

?>