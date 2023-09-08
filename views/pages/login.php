<?php

use App\Services\Part;

session_start();
// $_SESSION["err"] = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MS</title>
</head>

<body>
    <?php
    Part::html__parts('navbar');
    Part::css_parts('nav');
    Part::css_parts('form');
    ?>
    <form action="/auth/auth" class="form" method="post">
        <h1 class="form__title">Вход</h1>
        <div class="form__group">
            <input type="email" class="form__input" name="email" placeholder=" " value="<?php echo $_POST['email']  ?>">
            <label class="form__label">Эл. Почта</label>
        </div>
        <div class="form__group">
            <input type="password" class="form__input" name="password" placeholder=" " value="<?php echo $password  ?>">
            <label class="form__label">Пароль</label>
        </div>
        <button type="submit" class="form__button">Войти</button>
        <?php echo $_SESSION["err"] ?>
    </form>
    <div class="underform">
        <a href="/register" class="underform__text">Еще нет аккаунта?</a>
        <a href="/register" class="underform__register">Регистрация</a>
    </div>
</body>

</html>