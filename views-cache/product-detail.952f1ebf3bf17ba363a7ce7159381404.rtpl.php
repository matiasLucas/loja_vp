<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Detalhes do Produto</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Produtos</a></li>
                        <li class="breadcrumb-item active">Detalhes do Produto </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6"> 
                    <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                        <img class="d-block w-100 img-fluid" src="<?php echo htmlspecialchars( $product["image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="" />
                    </li>                            
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2><?php echo htmlspecialchars( $product["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                        <h5>R$<?php echo htmlspecialchars( $product["price"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>                        
                            <p>
                                <h4>Descrição</h4>
                                <p><?php echo htmlspecialchars( $product["desc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                                <ul>                                   
                                    <li>
                                        <div class="form-group quantity-box">
                                            <label class="control-label">Quantidade</label>
                                            <input class="form-control" value="0" min="0" max="20" type="number">
                                        </div>
                                    </li>
                                </ul>
                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">
                                        <a class="btn hvr-hover" data-fancybox-close="" href="/cart/{values.idproduct}/add">Comprar</a>                                        
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->