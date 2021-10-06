<?php include ROOT . '/views/layouts/header.php'; ?>

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
                                        <a href="/category/<?php echo $categoryItem['id']; ?>">
                                            <?php echo $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>




                <?php if ($result) : ?>

                    <p>Заказ оформлен. Мы Вам перезвоним.</p>

                    <?php return; ?>
                <?php else : ?>

                    <?php if (!isset($totalQuantity)) : ?>

                        <p>Заказ уже оформлен. Вернитесь на <a href="/">главную.</a></p>

                    <?php else : ?>


                        <p>Выбрано товаров: <?php echo $totalQuantity; ?>, на сумму: <?php echo $totalPrice; ?>, грн.</p><br />

                        <div class="col-sm-4">


                            <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                            <div class="login-form">
                                <form action="/cart/checkout/" method="post">

                                    <p>Ваша имя</p>
                                    <input type="text" name="userName" placeholder="" value="<?php echo $userName; ?>" />

                                    <p>Номер телефона</p>
                                    <input type="text" name="userPhone" placeholder="" value="<?php echo $userPhone; ?>" />

                                    <p>Комментарий к заказу</p>
                                    <input type="text" name="userComment" placeholder="Сообщение" value="<?php echo $userComment; ?>" />
                                    
                                    <div class="block">
                                        <?php if (isset($errors) && is_array($errors)) : ?>
                                            <ul>
                                                <?php foreach ($errors as $error) : ?>
                                                    <li> - <?php echo $error; ?></li>
                                                <?php endforeach ?>
                                            </ul>
                                        <?php endif ?>
                                    </div>

                                    <br />
                                    <input type="submit" name="submit" class="btn btn-default" value="Оформить" />

                                    

                                </form>
                            </div>
                        </div>

                    <?php endif; ?>
                <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

<style>

    .block {
        width: 360px;
        margin-right: 40px;
        color: red;
    }

    footer {
        margin-top: 40px;
    }

</style>