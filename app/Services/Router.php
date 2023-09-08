<?php
// use App\Controllers\Auth;

namespace App\Services;

class Router
{
    private static $list = [];
    public static function page($uri, $page)
    {
        self::$list[] = [
            "uri" => $uri,
            "page" => $page
        ];
    }


    public static function enable()
    {
        $query = $_GET["q"];

        foreach (self::$list as $route) {
            if ($route["uri"] === '/' . $query) {
                if ($route["post"]) {
                    $action = new $route["class"];
                    $method = $route["method"];
                    if($route["files"]){
                        $action->$method($_POST, $_FILES);
                    } else{
                        $action->$method($_POST);
                    }
                    die();

                } elseif($route["get"]){
                    $action = new $route["class"];
                    $method = $route["method"];
                    if($route["files"]){
                        $action->$method($_GET, $_FILES);
                    } else{
                        $action->$method($_GET);
                    }
                    die();
                }
                else {
                    if(file_exists("views/pages/" . $route["page"] . '.php')){
                        require_once "views/pages/" . $route["page"] . '.php';
                    } elseif(file_exists("views/pages/" . $route["page"] . '.html')){
                        require_once "views/pages/" . $route["page"] . '.html';
                    }
                    die();
                }
            }
        }
        self::not_found_page('404');
    }

    public static function not_found_page($error)
    {
        require_once 'views/errors/' . $error . '.php';
    }

    public static function post($uri, $class, $method)
    {
        self::$list[] = [
            "uri" => $uri,
            "class" => $class,
            "method" => $method,
            "post" => true,
            "files" => true
        ];
    }

    public static function get($uri, $class, $method)
    {
        self::$list[] = [
            "uri" => $uri,
            "class" => $class,
            "method" => $method,
            "get" => true,
            "files" => true
        ];
    }

    public static function redirect($uri)
    {
        header('Location:' . $uri);
    }
}
