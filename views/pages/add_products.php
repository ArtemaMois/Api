<?php

use App\Services\AdminDb;
use App\Services\Part;
use App\Services\Validate;


new AdminDb();
// $_SESSION['products_err'] = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/views/pages/js/jquery.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    Part::html__parts('navbar');
    Part::css_parts('nav');
    Part::css_parts('nav');
    Part::css_parts('form');
    ?>
    <form action="/validate/valid" class="form" method="post" enctype="multipart/form-data">
        <h1 class="form__title">Добавить товар</h1>
        <div class="form__group">
            <input type="text" class="form__input" name="productname" placeholder=" " value="<?= $_POST['productname'] ?>" required>
            <label class="form__label">Название товара</label>
            <? echo $_SESSION["size_err"] ?>
        </div>
        <div class="form__group">
            <label class="input-file">
                <input type="file" name="image">
                <span>Выберите файл</span>
            </label>
            <? echo $_SESSION["format_err"] ?>
        </div>
        <div class="form__group">
            <input type="text" class="form__input" name="cost" placeholder=" " value="<?= $_POST['cost'] ?>" required>
            <label class="form__label">Цена товара</label>
            <? echo $_SESSION["cost_err"] ?>
        </div>
        <button type="submit" class="form__button">Добавить</button>
    </form>


    <script>
        $('.input-file input[type=file]').on('change', function() {
            let file = this.files[0];
            $(this).next().html(file.name);
        });
    </script>
</body>

</html>