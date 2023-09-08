<?php 

namespace App\Services;

use App\Services\AdminDb;
use App\Services\Router;

class Validate
{

    private static $extends = ["png", "jpg", "jpeg"];

    public static function valid($data, $files)
    {
        $_SESSION['size_err'] = "";
        $_SESSION['format_err'] = "";
        $_SESSION['cost_err'] = "";


        if(!self::true_size($files)){
            $_SESSION["size-err"] = "<small class='error__message-login'>Слишком большой файл</small>";
            Router::redirect('/add_products');
            die();
        } elseif(!self::extension($files)){
            $_SESSION["format_err"] = "<small class='error__message-login'>Неверный формат</small>";
            Router::redirect('/add_products');
            die();
        } elseif(!self::true_cost($data)){
            $_SESSION["cost_err"] = "<small class='error__message-login'>Неверная цена</small>";
            Router::redirect('/add_products');
            die();
        } else {
            self::directory();
            mkdir(__DIR__ . '/../../uploads');
            // Router::not_found_page('500');
            $pathname = __DIR__ . '/../../uploads';
            $filename = time() . $files['image']['name'];
            $arr = [
                'productname' => $data['productname'],
                'cost' => $data['cost'],
                'image' => "uploads/$filename"
            ];
            move_uploaded_file($files['image']['tmp_name'], "$pathname/$filename");
            AdminDb::insert($arr);
            Router::redirect('/admin');
            die();
        }
        Router::not_found_page('500');

    }
    public static function update($data, $files)
    {
        $_SESSION['size_err'] = "";
        $_SESSION['format_err'] = "";
        $_SESSION['cost_err'] = "";

        if(empty($files['image']['name'])){
            if(!self::true_cost($data)){
                $_SESSION["cost_err"] = "<small class='error__message-login'>Неверная цена</small>";
                Router::redirect('/change');
                die();
            } else{
                $arr = [
                    'id' => $_SESSION['product']['id'],
                    'productname' => $data['productname'],
                    'cost' => $data['cost']
                ];
                AdminDb::update_without_image($arr);
                unset($_SESSION['product']['id']);
                Router::redirect('/admin');
            }
        } else {
            if(!self::true_size($files)){
                $_SESSION["size-err"] = "<small class='error__message-login'>Слишком большой файл</small>";
                Router::redirect('/change');
                die();
            } elseif(!self::extension($files)){
                $_SESSION["format_err"] = "<small class='error__message-login'>Неверный формат</small>";
                Router::redirect('/change');
                die();
            } elseif(!self::true_cost($data)){
                $_SESSION["cost_err"] = "<small class='error__message-login'>Неверная цена</small>";
                Router::redirect('/change');
                die();
            } else {
                $pathname = __DIR__ . '/../../uploads';
                $filename = time() . $files['image']['name'];
                $arr = [
                    'id' => $_SESSION['product']['id'],
                    'productname' => $data['productname'],
                    'cost' => $data['cost'],
                    'image' => "uploads/$filename"
                ];
                // print_r($arr);
                move_uploaded_file($files['image']['tmp_name'], "$pathname/$filename");
                AdminDb::update_with_image($arr);
                unset($_SESSION['product']['id']);
                Router::redirect('/admin');
                die();

        }

        }
        Router::not_found_page('500');

    }

    public static function fill_data($data){
        if(!isset($data)){
            $_SESSION['size_err'] = "";
            $_SESSION['format_err'] = "";
            $_SESSION['cost_err'] = "";
        }
    }

    private static function true_size($data)
    {
        $sizeImage = $data['image']['size'] / 1000000;
        $maxsize = 1;
        if($sizeImage < $maxsize){
            return true;
        }

    }

    private static function extension($file)
    {
        $ext = pathinfo($file['image']['name'], PATHINFO_EXTENSION);
        if (in_array(strtolower($ext), self::$extends))
        {
            return true;
        }
    }

    private static function directory(){
        if (!is_dir(__DIR__ . '/../uploads')){
            mkdir('/../uploads');
        }
    }
    
    private static function true_cost($data)
    {
        if (is_numeric($data['cost'])){
            return true;
        }
    }
}