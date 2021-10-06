
<?php include ROOT.'/views/layouts/header.php'; ?>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Каталог</h2> 
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            <?php foreach ($categories as $categoryItem):?>
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
                        <!--/category-products-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <!--product-details-->
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <img src="template/images/home/product7.jpg" alt="" />
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="product-information">
                                    <!--/product-information-->
                                    <?php if ($product['is_new']):?>
                                    <img src="template/images/product-details/new.jpg" class="newarrival" alt="" />
                                    <?php endif ?>
                                    <h2><?php echo $product['name'] ?></h2>
                                    <p>Код товара: <?php echo $product['code'] ?></p>
                                    <span>
                                        <span><?php echo $product['price'] ?> грн.</span>
                                        <label>Количество:</label>
                                        <input type="text" value="1" />
                                        <button type="button" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            В корзину
                                        </button>
                                    </span>
                                    <p><b>Наличие:</b> <?php if ($product['availability']) { echo 'Есть в наличии'; } else { echo 'Нет на складе'; } ?></p>
                                    <p><b>Состояние:</b> Новое</p>
                                    <p><b>Производитель:</b> <?php echo $product['brand'] ?></p>
                                </div>
                                <!--/product-information-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Описание товара</h5>
                                <p>Разнообразный и богатый опыт постоянный количественный рост и
                                    сфера нашей активности требуют определения и уточнения направлений
                                    прогрессивного развития. Таким образом реализация намеченных плановых
                                    заданий требуют определения и уточнения форм развития.</p>
                                <p>Повседневная практика показывает, что новая модель организационной
                                    деятельности способствует подготовки и реализации позиций, занимаемых
                                    участниками в отношении поставленных задач. Таким образом постоянное
                                    информационно-пропагандистское обеспечение нашей деятельности влечет
                                    за собой процесс внедрения и модернизации форм развития.</p>
                                <p>Повседневная практика показывает, что новая модель организационной
                                    деятельности способствует подготовки и реализации позиций, занимаемых
                                    участниками в отношении поставленных задач. Таким образом постоянное
                                    информационно-пропагандистское обеспечение нашей деятельности влечет
                                    за собой процесс внедрения и модернизации форм развития.</p>
                                <p>Повседневная практика показывает, что новая модель организационной
                                    деятельности способствует подготовки и реализации позиций, занимаемых
                                    участниками в отношении поставленных задач. Таким образом постоянное
                                    информационно-пропагандистское обеспечение нашей деятельности влечет
                                    за собой процесс внедрения и модернизации форм развития.</p>
                            </div>
                        </div>
                    </div>
                    <!--/product-details-->

                </div>
            </div>
        </div>
    </section>

    <br/>
    <br/>
</body>

<?php include ROOT.'/views/layouts/footer.php'; ?>
