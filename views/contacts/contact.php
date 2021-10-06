<?php include ROOT . '/views/layouts/header.php'; ?>

<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Обратная связь</h2>
                    <h5>Есть вопрос? Напишите нам</h5>
                    <form action="/contacts/" method="post">
                        <input type="text" name="userEmail" placeholder="E-mail" value="<?php echo $userEmail; ?>">
                        <input type="text" name="userText" placeholder="Сообщение" value="<?php echo $userText; ?>">
                        <input type="submit" name="submit" class="btn btn-default" value="Отправить">
                        
                        <div class="block">
                        <?php if (isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>

                        <?php if ($result): ?>
                            <p>Сообщение отправлено! Мы ответим вам на указаный E-mail</p>
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

</style>