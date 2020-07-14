<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Products;

//Lista todas os produtos
$app->get("/admin/products", function(){

    User::verifyLogin();

	$products = Products::listAll();
	
	$page = new PageAdmin();

	$page->setTpl("products", [
			'products'=>$products
		]);

});

//Tela de cadastro de produtos
$app->get("/admin/products/create", function(){

	User::verifyLogin();

	$page = new PageAdmin();

    $page->setTpl("/admin/products-create");

});

//Cadastra novo produto
$app->post("/admin/products/create", function(){

    User::verifyLogin();

	$products = new Products();

	$products->setData($_POST);
    
	$products->save();

	header("Location: /admin/products");
    exit;

});

//Deleta categoria
$app->get("/admin/products/:id/delete", function($id){

    User::verifyLogin();

    $products = new Products();

	$products->get((int)$id);

	$products->delete();

	header("Location: /admin/products");
	exit;

});

?>