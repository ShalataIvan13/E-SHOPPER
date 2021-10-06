<?php include ROOT . '/views/layouts/header.php'; ?>

<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 marlef">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Редактирование данных</h2>
                    <form action="/cabinet/edit" method="post">
                        <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>">
                        <input type="password" name="password" placeholder="Пароль" >
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        
                        <div class="block">
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>

                        <?php if ($result): ?>
                            <p>Сохранено!</p>
                        <?php endif ?>
                        </div>
                        

                        
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->

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

    footer {
        margin-top: 138px;
    }

    .marlef {
        margin-left: 370px;
    }


</style>