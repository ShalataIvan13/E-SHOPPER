<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                        <?php foreach ($categories as $category) : ?>
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
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>

                    <?php if ($productsInCart) : ?>
                        <p>Вы выбрали такие товары:</p>
                        <table class="table-bordered  table">
                            <tr>
                                <th>Код товара</th>
                                <th>Название</th>
                                <th>Стомость, грн</th>
                                <th>Количество, шт</th>
                                <th>Удалить</th>
                            </tr>
                            <?php foreach ($products as $product) : ?>
                                <tr>
                                    <td><?php echo $product['code']; ?></td>
                                    <td>
                                        <a href="/product/<?php echo $product['id']; ?>">
                                            <?php echo $product['name']; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $product['price']; ?> грн.</td>
                                    <td><?php echo $productsInCart[$product['id']]; ?></td>
                                    <td><a href="/cart/delete/<?php echo $product['id'] ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3">Общая стоимость:</td>
                                <td><?php echo $totalPrice; ?> грн.</td>
                            </tr>


                        </table>

                        <div>
                            <a href="/cart/checkout/"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
                        </div>
                    <?php else : ?>
                        <p>Корзина пуста</p>
                    <?php endif; ?>

                </div>

            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

<style>

    footer {
        position: relative;
        margin-top: 38px;
    }

    .fa-times {
        padding-left: 25px;
    }

</style>