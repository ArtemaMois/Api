<?php
    use App\Services\Part;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>

<body>
    <?php
        Part::html__parts('navbar');
        Part::css_parts('nav');
    ?>
    <h1 style="margin: 150px 0 0 0;">404 - Page not found</h1>

</body>

</html>