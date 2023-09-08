<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav class="nav">
        <div class="nav__body">
            <div class="nav__logo"><a href="#">AIB</a></div>
            <div class="nav__menu">
                <a href="/catalog" class="nav__catalog">Товары</a>
                <?php if(!$_SESSION['user']) {
                ?>
                    <a href="/login" class="nav__login">Вход</a>
                    <a href="/register" class="nav__register">Регистрация</a>
                    <?php 
                } else {
                    ?>
                    <a href="/add_products" class="nav__basket">Админка</a>
                    <a href="/auth/exit" class="nav__login">Выход</a>
                    <?php
                }
                ?>
            </div>
        </div>
    </nav>
</body>

</html>