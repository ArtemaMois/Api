<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Oswald:wght@500&family=Roboto:wght@500&family=Ubuntu:wght@500&display=swap');


        a {
            padding: 0px;
            margin: 0px;
            border: none;
        }

        a,
        a:link,
        a:visited {
            text-decoration: none;
        }

        .basket {
            width: 195px;
            height: 48px;
            padding: 0 10px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-left: 80%;
            margin-top: 1%;
            border-radius: 40px;
            transition: all .4s;
        }

        .basket__text {
            width: 140px;
            height: 35px;
            display: flex;
            text-align: center;
            justify-content: space-between;
        }

        .basket__icon {
            width: 35px;
            height: 35px;
            margin: 5px 4px 0 0;
        }

        .basket__btn {
            font-family: 'Montserrat', sans-serif;
            font-size: 24px;
            margin-right: 5px;
            line-height: 35px;
        }

        .basket__count {
            width: 32px;
            height: 32px;
            border-radius: 16px;
            margin-left: 8px;
            text-align: center;
            line-height: 30px;
            background-color: rgb(89, 150, 255);
            font-family: 'Ubuntu', sans-serif;
            font-size: 21px;

        }

        .basket:hover {
            background-color: rgb(239, 239, 239);
        }



        .catalog {
            width: 80%;
            display: flex;
            flex-wrap: wrap;
            margin: 50px -25px 40px 0px;
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

        .card__basket {
            cursor: default;
            height: 37px;
            width: 90px;
            margin-right: 3px;
            text-decoration: none;
            display: inline-block;
            padding: 0 12px;
            background: #cccccc;
            color: white;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 14px;
            line-height: 37px;
            transition: background-color .2s;
            transition: all .3s ease-in;
            /* text-align: start; */
        }

        .card__basket:hover {
            background: #0031d4;
        }

        .card__basket:active {
            background-color: rgb(0, 15, 42);
            transition: background-color .2s;
        }
    </style>

</body>

</html>