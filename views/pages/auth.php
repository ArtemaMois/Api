<?php

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
    <?php
    Part::html__parts('navbar');
    Part::css_parts('nav');
    print_r($_POST['password']);
    $user = DB::select($_POST);
    echo '<br>';
    if (!$user){
        echo "Empty";
    } else{
        echo "Good";
    }
    ?>


</body>

</html>