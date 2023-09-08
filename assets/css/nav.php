<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cousine:wght@700&family=JetBrains+Mono:wght@700&display=swap');

        * {
            padding: 0;
            margin: 0;
            border: 0;
        }

        a {
            text-decoration: none;
            color: black;
        }

        body {
            height: auto;
            display: flex;
            flex-direction: column;
            /* justify-content: center; */
            align-items: center;
            overflow-x: hidden;

        }

        .nav {
            height: 80px;
            width: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f1f1f1;
        }

        .nav__body {
            height: 50px;
            width: 92%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav__logo {
            font-size: 30px;
            font-family: 'JetBrains Mono', monospace;
            font-weight: 700;
        }

        .nav__menu {
            width: 30%;
            height: auto;
            margin-right: 17px;
            display: flex;
            justify-content: space-between;
            font-size: 22px;
            font-family: 'Cousine', monospace;
            letter-spacing: 1px;
        }

        .nav__login,
        .nav__register, 
        .nav__catalog, 
        .nav__basket {
            transition: all .2s;
        }

        .nav__login:hover,
        .nav__register:hover,
         .nav__catalog:hover,
         .nav__basket:hover {
            color: #001aff;
        }
    </style>

</body>

</html>