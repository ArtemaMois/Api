<?php

$arr = $_GET;

// print_r($arr);

use App\Services\Admindb;
use App\Services\Part;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменение товара</title>
    <script src="/views/pages/js/jquery.js"></script>
</head>

<body>
    <?
    Part::html__parts('navbar');
    Part::css_parts('nav');
    Part::css_parts('changestyle');
    $_SESSION['product']['id'] = $arr['id'];
    ?>
    <form action="/validate/update" class="form" method="post" enctype="multipart/form-data">
        <h1 class="form__title">Изменить товар</h1>
        <div class="form__content">
            <div class="selected__image">
                <img src="<? echo $arr['image'] ?>" alt="">
            </div>
            <div class="form__body">
                <div class="form__group">
                    <input type="text" class="form__input" name="productname" placeholder=" " value="<? echo $arr['productname'] ?>" required>
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
                    <input type="text" class="form__input" name="cost" placeholder=" " value="<? echo $arr['cost'] ?>" required>
                    <label class="form__label">Цена товара</label>
                    <? echo $_SESSION["cost_err"] ?>
                </div>
                <button type="submit" class="form__button">Изменить</button>
            </div>
        </div>

    </form>

    <script>
        $('.input-file input[type=file]').on('change', function() {
            let file = this.files[0];
            $(this).next().html(file.name);
        });
    </script>
</body>

</html>