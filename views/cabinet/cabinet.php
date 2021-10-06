<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h2>Кабинет пользователя</h2>

            <h4>Привет, <?php echo $userName[0]; ?>!</h4>

            <ul>
                <li><a href="/cabinet/edit"><button class="btn-default">Редактировать данные</button></a></li>
                <li><a href="/cabinet/history"><button class="btn-default mb">Список покупок</button></a></li>
            </ul> 
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

<style>

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

    footer {
        margin-top: 191px;
    }

    h2, h4 {
        padding-left: 40px;
        margin-bottom: 40px;
    }

</style>
