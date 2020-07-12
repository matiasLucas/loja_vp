<?php

use \Hcode\Page;
use \Hcode\Model\User;

//Rota pagina inicial
$app->get('/', function() {
        
    $page = new Page();

    $page->setTpl("index");

});


?>