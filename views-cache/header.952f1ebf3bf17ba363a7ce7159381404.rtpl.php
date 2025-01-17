<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Loja Vp</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/res/site/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/res/site/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/res/site/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/res/site/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/res/site/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/res/site/css/custom.css">
    
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="/"><h1>Loja VP</h1> </h1></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="/">Pagina inicial</a></li>                        
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Produtos</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">                                
                            <li>
                            <div class="col-menu col-md-3">
                                <h6 class="title">Categorias</h6>
                                <div class="content">
                                    <ul class="menu-col">
                                        <?php require $this->checkTemplate("categories-menu");?>                                    
                                        </ul>
                                    </div>
                                </div> 
                            </div>                                    
                </ul>
            </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    
                </div>
                <!-- End Atribute Navigation -->
            </div>            
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->
