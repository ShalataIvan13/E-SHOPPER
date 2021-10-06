<?php include ROOT . '/views/layouts/header.php'; ?>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Каталог</h2>
                        <div class="panel-group category-products">
                            <?php foreach ($categories as $categoryItem) : ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="/category/<?php echo $categoryItem['id'] ?>">
                                                <?php echo $categoryItem['name'] ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!--shipping-->
                        <div class="shipping text-center">
                            <img src="template/images/home/shipping.jpg" alt="" />
                        </div>
                        <!--/shipping-->

                    </div>
                </div>



                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!-- features_items -->
                        <h2 class="title text-center">Последние товары</h2>
                        <?php foreach ($lastProduct as $product) : ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="i productinfo text-center">
                                            <img src="template/images/home/product8.jpg" alt="" />
                                            <h2><?php echo $product['price'] ?> грн.</h2>
                                            <a href="/product/<?php echo $product['id']; ?>">
                                                <p><?php echo $product['name'] ?></p>
                                            </a>
                                            <a href="/cart/addAjax/<?php echo $product['id']; ?>" data-id="<?php echo $product['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <?php if ($product['is_new']) : ?>
                                            <img src="template/images/home/new.png" class="new" alt="" />
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                     <!--features_items-->

                    <div class="recommended_items">
                        <!-- recommended_items -->
                        <h2 class="title text-center">Рекомендуемые товары</h2 >

                        <!-- <h1 style="width: 410px;
                                   height: 74px; 
                                   padding: 14px 24px;
                                   margin-left:180px;
                                   border:2px solid black;">
                                   Здесь будет слайдер</h1> -->
                       <div class="cycle-slideshow" data-cycle-fx=carousel 
                                                    data-cycle-timeout=5000 
                                                    data-cycle-carousel-visible=3
                                                    data-cycle-carousel-fluid=true
                                                    data-cycle-slides="div.item"
                                                    data-cycle-prev="#prev" 
                                                    data-cycle-next="#next">
                            <?php foreach ($sliderProducts as $sliderItem) : ?>
                                <div class="item">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="/template/images/home/product8.jpg" alt="" />
                                                <h2><?php echo $sliderItem['price']; ?> грн.</h2>
                                                <a href="/product/<?php echo $sliderItem['id']; ?>">
                                                    <?php echo $sliderItem['name']; ?>
                                                </a>
                                                <br /><br />
                                                <a href="/cart/addAjax/<?php echo $product['id']; ?>" class="btn btn-default add-to-cart" data-id="<?php echo $sliderItem['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                            <?php if ($sliderItem['is_new']) : ?>
                                                <img src="/template/images/home/new.png" class="new" alt="" />
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <a class="left recommended-item-control" id="prev" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" id="next" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div> 
                <!--/recommended_items-->

            </div>
        </div>
        </div>
    </section>
</body>

<?php include ROOT . '/views/layouts/footer.php'; ?>

<style>

    .productinfo img {
        width: 200px;
        height: 200px;
    }

    .i img {
        width: 249px;
        height: 250px;
    }

    

    .recommended-item-control {
        margin-top: 500px;
    }

</style>

