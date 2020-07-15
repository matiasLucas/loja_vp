<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="/res/site/images/banner-01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bem-vindo à <br> Loja VP</strong></h1>
                            <p class="m-b-40">Confira nossa coleção de produtos <br> clique abaixo:</p>
                            <p><a class="btn hvr-hover" href="#">Comprar</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="/res/site/images/banner-02.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bem-vindo à <br> Loja VP</strong></h1>
                            <p class="m-b-40">Confira nossa coleção de produtos <br> clique abaixo:</p>
                            <p><a class="btn hvr-hover" href="#">Comprar</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-right">
                <img src="/res/site/images/banner-03.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bem-vindo à <br> Loja VP</strong></h1>
                            <p class="m-b-40">Confira nossa coleção de produtos <br> clique abaixo:</p>
                            <p><a class="btn hvr-hover" href="#">Comprar</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <?php $counter1=-1;  if( isset($category) && ( is_array($category) || $category instanceof Traversable ) && sizeof($category) ) foreach( $category as $key1 => $value1 ){ $counter1++; ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="<?php echo htmlspecialchars( $value1["image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="" />                        
                        <a class="btn hvr-hover" href="/category/<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Categories -->