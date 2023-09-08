<?php

use App\Services\Part;
use App\Services\DB;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sassets/css/log.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Sign up - M</title>
</head>

<body>
    <?php
    Part::html__parts('navbar');
    Part::css_parts('nav');
    Part::css_parts('form');
    ?>
    <form action="/auth/register" class="form" method="post">
        <h1 class="form__title">Регистрация</h1>
        <div class="form__group">
            <input type="text" class="form__input" name="username" placeholder=" " value="<?php echo $_POST['name'] ?>" required>
            <label class="form__label">Имя</label>
        </div>
        <div class="form__group">
            <input type="email" class="form__input" name="email" placeholder=" " value="<?php echo $_POST['email'] ?>" required>
            <label class="form__label">Эл. Почта</label>
        </div>
        <div class="form__group">
            <input type="password" class="form__input" name="password" placeholder=" " value="<?php echo $_POST['password'] ?>" required>
            <label class="form__label">Пароль</label>
        </div>
        <div class="form__group">
            <input type="password" class="form__input" name="password_confirm" placeholder=" " required>
            <label class="form__label">Подтвердите пароль</label>
        </div>
        <button type="submit" class="form__button">Зарегистрироваться</button>
        <?php echo '<br>'.$err ?>
    </form>
    <div class="underform">
        <a href="/login" class="underform__text">Уже есть аккаунт?</a>
        <a href="/login" class="underform__login">Войти</a>
    </div>
    
</body>

</html>