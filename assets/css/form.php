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
       @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@600&family=Raleway:wght@600&display=swap');
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


        .form {
            width: 350px;
            margin-top: 30px;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 4px 16px #ccc;
            font-family: sans-serif;
            letter-spacing: 1px;
        }

        .form__input,
        .form__button {
            font-family: sans-serif;
            letter-spacing: 1px;
            font-size: 16px;
        }

        .form__title {
            text-align: center;
            margin: 0 0 32px 0;
            font-weight: normal;
        }

        .form__group {
            position: relative;
            margin-bottom: 32px;
        }

        .form__label {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            color: #9e9e9e;
            transition: all .3s;
        }

        .form__input {
            width: 100%;
            padding: 0 0 10px 0;
            border: none;
            border-bottom: 1px solid #e0e0e0;
            background-color: transparent;
            outline: none;
            transition: .3s;
        }

        .form__input:focus {
            border-bottom: 1px solid #1a73a8;
        }

        .form__button {
            padding: 10px 20px;
            border: none;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #fff;
            background-color: #0071f0;
            outline: none;
            cursor: pointer;
            transition: all .3s;
        }

        .form__button:hover,
        .form__button:focus {
            background-color: rgba(0, 113, 240, 0.7);
        }

        .form__input:focus~.form__label,
        .form__input:not(:placeholder-shown)~.form__label {
            top: -18px;
            font-size: 12px;
            color: #001aff;
        }
        .underform{
            margin-top: 20px;
            width: 280px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .underform__text{
            flex-wrap: nowrap;
            margin-left: 2%;
            font-family: 'Open Sans', sans-serif;
            font-weight: normal;
            font-size: 16px;
            color: rgb(79, 79, 79);
            transition: all .3s;
        }
        .underform__login{
            margin-right: 22%;
            font-family: 'Raleway', sans-serif;
            font-size: 17px;
            font-weight: 700;
            letter-spacing: 1px;
            color: #001aff;
            transition: all .3s;
        }
        .underform__register{
            font-family: 'Raleway', sans-serif;
            font-size: 17px;
            font-weight: 700;
            letter-spacing: 1px;
            color: #001aff;
            transition: all .3s;
        }
        .underform__text:hover, .underform__login:hover, .underform__register:hover{
            color: rgb(253, 167, 6);
        }
        .error__message-login{
            margin-left: 10px;
            color: red;
            font-family: 'Raleway', sans-serif;
            font-size: 15px;
        }
        .error__message-register{
            margin-left: 1px;
            color: red;
            font-family: 'Raleway', sans-serif;
            font-size: 15px;
        }
        .input-file {
        position: relative;
        display: inline-block;
    }

    .input-file span {
        position: relative;
        display: inline-block;
        cursor: pointer;
        outline: none;
        text-decoration: none;
        font-size: 14px;
        vertical-align: middle;
        color: rgb(255 255 255);
        text-align: center;
        border-radius: 4px;
        background-color: #419152;
        line-height: 22px;
        height: 40px;
        padding: 10px 20px;
        box-sizing: border-box;
        border: none;
        margin: 0;
        transition: background-color 0.2s;
    }

    .input-file input[type=file] {
        position: absolute;
        z-index: -1;
        opacity: 0;
        display: block;
        width: 0;
        height: 0;
    }

    /* Focus */
    .input-file input[type=file]:focus+span {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
    }

    /* Hover/active */
    .input-file:hover span {
        background-color: #59be6e;
    }

    .input-file:active span {
        background-color: #2E703A;
    }

    /* Disabled */
    .input-file input[type=file]:disabled+span {
        background-color: #eee;
    }
    </style>
    
</body>
</html>