<?php include ROOT . '/views/layouts/header.php'; ?> 

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                        <?php foreach ($categories as $category):?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="/category/<?php echo $category['id']; ?>">
                                <?php echo $category['name']; ?>
                            </a></h4>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <!--/category-products-->


                    <div class="shipping text-center">
                        <!--shipping-->
                        <img src="template/images/home/shipping.jpg" alt="" />
                    </div>
                    <!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>

                    <?php foreach ($lastProduct as $product):?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="template/images/home/product8.jpg" alt="" />
                                    <h2><?php echo $product['price']; ?> грн.</h2>
                                    <a href="/product/<?php echo $product['id']; ?>">
                                        <p><?php echo $product['name'] ?></p>
                                    </a>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                </div>
                                <?php if ($product['is_new']):?>
                                <img src="template/images/home/new.png" class="new" alt="" />
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    

                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>
                </div>
                <!--features_items-->

            </div>
        </div>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php'; ?>
