<?php

use App\Services\Part;
use App\Services\AdminDb;

if ($_POST['id']) {
    // AdminDb::delete($_POST);
    print_r($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Admin</title>
</head>

<body>
    <?php
    Part::html__parts('navbar');
    Part::css_parts('nav');
    Part::css_parts('list');
    $result = AdminDb::select();
    ?>
    <div class="new-product">
        <a href="/add_products" class="new-product__body">
            <img class="new-product__image" src="/assets/images/newprod.svg" alt="">
            <div class="new-product__text">Новый товар</div>
        </a>
    </div>
    <div class="catalog">
        <? foreach ($result as $arr) { ?>
            <div class="card">
                <div class="card__image"><img src="<? echo $arr["image"] ?>" alt=""></div>
                <div class="card__info">
                    <div class="card__cost"><? echo $arr["cost"] ?></div>
                    <div class="card__product"><? echo $arr["productname"] ?></div>
                    <a href="/change?id=<?= $arr['id'] ?>&productname=<?= $arr['productname'] ?>&cost=<?= $arr['cost'] ?>&image=<?= $arr['image'] ?>" class="card__button-change">Изменить</a>
                    <a href="/adminDb/delete?id=<?= $arr["id"] ?>" class="card__button-delete">Удалить</a>
                </div>
            </div>
        <?
        }
        ?>
    </div>
    <?
    Part::html__parts('footer');
    Part::css_parts('footerstyle');
    ?>
</body>

</html>