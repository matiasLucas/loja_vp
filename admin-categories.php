<?php

use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Category;
use \Hcode\Model\Products;

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
$app->get("/admin/categories/:idcategory/delete", function($idcategory) {

    User::verifyLogin();

    $category = new Category();

	$category->get((int)$idcategory);

	$category->delete();

	header("Location: /admin/categories");
	exit;

});

//Tela de edição de categoria
$app->get("/admin/categories/:idcategory", function($idcategory) {

	User::verifyLogin();

    $category = new Category();	

	$category->get((int)$idcategory);	

    $page = new PageAdmin();

    $page->setTpl("/admin/categories-update",array(
        "category"=>$category->getValues()	
    ));

});

//Edita a categoria
$app->post("/admin/categories/:idcategory", function($idcategory) {

	User::verifyLogin();

	$category = new Category();
	
    $category->get((int)$idcategory);  
	
    $category->setData($_POST);    
	
	$category->update();

	$category->setPhoto($_FILES["file"]);

	header("Location: /admin/categories");
	exit;
});

//Carrega os produtos da categoria
$app->get("/admin/categories/:idcategory/products", function($idcategory) {

	User::verifyLogin();

    $category = new Category();	

	$category->get((int)$idcategory);	

    $page = new PageAdmin();

    $page->setTpl("/admin/categories-products",array(
		"category"=>$category->getValues(),
		'productsRelated'=>$category->getProducts(),
		'productsNotRelated'=>$category->getProducts(false)
    ));

});

//Adiciona um produto na categoria
$app->get("/admin/categories/:idcategory/products/:idproduct/add", function($idcategory, $idproduct){

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);

	$product = new Products();

	$product->get((int)$idproduct);
 
	$category->addProduct($product);	

	header("Location: /admin/categories/".$idcategory."/products");
	exit;
});

//Remove um produto da categoria
$app->get("/admin/categories/:idcategory/products/:idproduct/remove", function($idcategory, $idproduct){

	User::verifyLogin();

	$category = new Category();

	$category->get((int)$idcategory);
	
	$product = new Products();

	$product->get((int)$idproduct);

	$category->removeProduct($product);	

	header("Location: /admin/categories/".$idcategory."/products");
	exit;
});

?>