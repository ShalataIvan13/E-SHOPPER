<?php include(ROOT . '/views/layouts/header_admin.php'); ?>

<div class="wrapper">
    <h4>Добрый день, администратор!</h4>
    <p class="title">Вам доступны такие возможности:</p>
    <a href="/admin/product"><button class="btn-default">Управление товарами</button></a>
    <br>
    <a href="/admin/category"><button class="btn-default">Управление катигориями</button></a>
    <br>
    <a href="/admin/order"><button class="btn-default">Управление заказами</button></a>
</div>


<?php include(ROOT . '/views/layouts/footer_admin.php'); ?>

<style>

    h4 {
        margin-bottom: 20px;
    }

    .title {
        margin-bottom: 20px;
    }

    .wrapper {
        margin: 40px 80px;
    }

    .btn-default {
        width: 200px;
        height: 38px;
        border-radius: 23px;
        border: none;
        color: white;
        margin: 0 0 10px 0px;
        background-color: orange;
        transition: .1s linear;
    }

    

</style>