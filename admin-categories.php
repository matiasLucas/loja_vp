<?php

use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Category;

//Lista todas as categorias
$app->get("/admin/categories", function(){

    User::verifyLogin();

	$categories = Category::listAll();
	
	$page = new PageAdmin();

	$page->setTpl("categories", [
			'categories'=>$categories
		]);

});

//Chama a tela de cadastro de categorias
$app->get("/admin/categories/create", function(){

	User::verifyLogin();

	$page = new PageAdmin();

    $page->setTpl("/admin/categories-create");

});

//Cria uma nova categoria
$app->post("/admin/categories/create", function(){

	User::verifyLogin();

	$category = new Category();

	$category->setData($_POST);

	$category->save();

	header("Location: /admin/categories");
    exit;

});

//Deleta uma categoria
$app->get("/admin/categories/:id/delete", function($id) {

    User::verifyLogin();

    $category = new Category();

	$category->get((int)$id);

	$category->delete();

	header("Location: /admin/categories");
	exit;

});

//Tela de edição de categoria
$app->get("/admin/categories/:id", function($id) {

	User::verifyLogin();

    $category = new Category();	

	$category->get((int)$id);	

    $page = new PageAdmin();

    $page->setTpl("/admin/categories-update",array(
        "category"=>$category->getValues()	
    ));

});

$app->post("/admin/categories/:id", function($id) {

	User::verifyLogin();

	$category = new Category();
	
    $category->get((int)$id);  
	
    $category->setData($_POST);    
	
	$category->update();

	$category->setPhoto($_FILES["file"]);

	header("Location: /admin/categories");
	exit;
});

?>