<?php

session_start();

use App\Services\Admindb;
use App\Services\Part;
use App\Services\DB;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары</title>
</head>

<body>
    <?
    Part::html__parts('navbar');
    Part::css_parts('nav');
    Part::css_parts('catalogstyle');
    $result = Admindb::select();
    ?>
    <a class="basket" href="/basket">
        <div class="basket__text">
            <div class="basket__icon"><img src="/assets/images/bas (1).svg" alt=""></div>
            <div class="basket__btn" href="/basket">Корзина</div>
        </div>
        <div class="basket__count"><? echo isset($_SESSION['count']) ? $_SESSION['count'] : '0' ?></div>
    </a>
    <div class="catalog">
        <? foreach ($result as $arr) { ?>
            <div class="card" id="<? echo $arr['id'] ?>" href="/item?id=<?= $arr['id'] ?>&productname=<?= $arr['productname'] ?>&cost=<?= $arr['cost'] ?>&image=<?= $arr['image'] ?>">
                <div class="card__image"><img src="<? echo $arr["image"] ?>" alt=""></div>
                <div class="card__info">
                    <div class="card__cost"><? echo $arr["cost"] ?></div>
                    <div class="card__product"><? echo $arr["productname"] ?></div>
                    <a href="/basket/in_basket?id=<? echo $arr['id'] ?>" class="card__basket">В корзину</a>
                </div>
        </div>
        <?
        }
        ?>
    </div>
    <? Part::js_parts('catalogjs'); ?>
</body>

</html>