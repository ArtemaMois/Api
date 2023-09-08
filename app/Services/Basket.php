<?php


namespace App\Services;

use App\Services\Router;

session_start();
class Basket
{
    private $basket = [];


    public function in_basket($params){
        $id = $params['id'];
        if(!isset($_SESSION['basket'])){
            $_SESSION['basket'][$id] = 1;
        } else{
            if(in_array($id, $_SESSION['basket'])){
                $_SESSION['basket'][$id] += 1;
            } else {
                $_SESSION['basket'][$id] = 1;
            }
        }
        $_SESSION['count'] = $this->basket_count();
        Router::redirect('/catalog');

    }

    private function basket_count()
    {
        $res = 0;
        foreach($_SESSION['basket'] as $arr){
            $res += $arr;
        }
        return $res;
    }



}
