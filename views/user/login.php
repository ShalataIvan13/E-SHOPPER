<?php include ROOT . '/views/layouts/header.php'; ?>

<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Войти в свой аккаунт</h2>
                    <form action="/user/login" method="post">
                        <input type="text" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
                        <input type="password" name="password" placeholder="Пароль">
                        <span>
                            <input type="checkbox" class="checkbox">
                            Запомнить меня
                        </span>
                        <button type="submit" name="submit" class="btn btn-default">Войти</button>

                        <div class="block">
                        <?php if (isset($errors) && is_array($errors)):?>
                            <ul>
                                <?php foreach ($errors as $error):?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                        </div>

                    </form>
                </div>
                <!--/login form-->
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

    .block li {
        padding-right: 30px;
    }
    .block ul {
        margin: 0;
        padding: 0;
    }

    .block p {
        color: green;
    }


</style>