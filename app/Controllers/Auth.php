<?php


namespace App\Controllers;

use App\Services\Router;
use App\Services\DB;

class Auth
{
    public function register($data)
    {
        $_SESSION['err'];
        $data['password']= password_hash($data['password'], PASSWORD_DEFAULT);
        if ($data) {
            if (password_verify($data['password_confirm'], $data['password'])) {
                $arr = [
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'password' => $data['password']
                ];
                DB::insert($arr);
                Router::redirect('/login');
            } else{
                $_SESSION['err'] = "<small class='error__message-register'>Пароли не совпадают</small>";
                Router::redirect('/register');
            }
        }
        else {
            Router::not_found_page('500');
        }
    }

    public function auth($data)
    {
        $_SESSION['err'] = "";
        // Router::redirect('/auth');
        $email = $data['email'];
        $password = $data['password'];
        $user = DB::select($data);
        if (!$user) {
            $_SESSION["err"] = "<small class='error__message-login'>Пользователь не найден</small>";
            Router::redirect('/login');
        } elseif (!password_verify($password, $user['password'])) {
            $password = "";
            $_SESSION["err"]  = "<small class='error__message-login'>Неверный пароль</small>";
            Router::redirect('/login');
        } else {
            session_start();
            $_SESSION["user"] = [
                "id" => $user["id"],
                "username" => $user["username"],
                "user_email" => $user["email"]
            ];
            Router::redirect('/catalog');
        }
    }


    public static function exit()
    {
        session_destroy();
        Router::redirect('/login');
    }
}
