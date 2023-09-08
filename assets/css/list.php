<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Roboto:wght@500&display=swap');

        .new-product {
            width: 200px;
            height: 50px;
            /* border: 1px solid red; */
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .new-product__body {
            width: 204px;
            height: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
            transition: all .4s;
        }
        .new-product__body:hover{
            background-color: rgb(239, 239, 239);
        }

        .new-product__image {
            width: 32px;
            height: 32px;
            transition: all .4s;
        }

        .new-product__text {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            transition: all .4s;
            /* letter-spacing: 0.5px; */
        }

        .catalog {
            width: 80%;
            display: flex;
            flex-wrap: wrap;
            margin: 30px -25px 40px 0px;
            align-items: flex-start;

        }

        .card {
            width: 250px;
            height: 330px;
            margin: 0px 25px 40px 25px;
            text-align: center;
            /* margin: 0 auto; */
            border-bottom: 2px solid #F5F5F5;
            background: white;
            font-family: "Open Sans";
            transition: .3s ease-in;
            background: #fafafa;
        }

        .card:hover {
            border-bottom: 2px solid #0031d4;
        }

        .card__image {
            width: 100%;
            height: 60%;
            border-radius: 5px;
            overflow: hidden;
            display: block;
        }

        .card__info {
            width: 100%;
            padding: 15px 0;
            margin-bottom: 5px;
        }

        .card__cost {
            font-size: 18px;
            color: black;
            font-family: 'Roboto', sans-serif;
            display: block;
            margin-bottom: 12px;
        }

        .card__product {
            font-size: 20px;
            font-weight: 400;
            color: #363636;
            margin: 0 0 10px 0;
            letter-spacing: 0.5px;
        }

        .card__button-delete {
            cursor: default;
            height: 27px;
            width: 57px;
            margin-right: 3px;
            text-decoration: none;
            display: inline-block;
            padding: 0 12px;
            background: #cccccc;
            color: white;
            text-transform: uppercase;
            font-size: 12px;
            line-height: 27px;
            transition: .3s ease-in;
        }

        .card__button-change {
            cursor: default;
            height: 27px;
            width: 57px;
            margin-right: 3px;
            text-decoration: none;
            display: inline-block;
            padding: 0 12px;
            background: #cccccc;
            color: white;
            text-transform: uppercase;
            font-size: 12px;
            line-height: 27px;
            transition: .3s ease-in;
            text-align: start;
        }

        .card__button-delete:hover {
            background: #0031d4;
        }

        .card__button-change:hover {
            background: #0031d4;
        }
    </style>

</body>

</html>