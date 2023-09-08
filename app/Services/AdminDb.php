<?php

namespace App\Services;


use PDO;
use PDOException;

class Admindb
{
    private static $config;
    private static $pdo;
    private static $host;
    private static $username;
    private static $password;
    private static $dbname;


    public function __construct()
    {
        self::$config = include 'config/admindb.php';
        self::$host = self::$config['host'];
        self::$username = self::$config['username'];
        self::$password = self::$config['password'];
        self::$dbname = self::$config['db'];
        $this->createDb();
        self::$pdo = $this->connect();
        $this->createTable();
    }


    private function createDb()
    {
        try {
            $pdo = new PDO("mysql:host=" . self::$host . "", self::$username, self::$password);
            $sql = "CREATE DATABASE productsDb";
            $prep = $pdo->prepare($sql);
            $pdo->exec($sql);
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }

    private static function connect()
    {
        try {
            $con = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname . "", self::$username, self::$password);
            return $con;
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
            return false;
        }
    }

    private function createTable()
    {
        try {
            if (!self::$pdo) {
                self::error();
            }
            $sql = "CREATE TABLE products (`id` INTEGER AUTO_INCREMENT PRIMARY KEY, 
            `productname` VARCHAR(256), 
            `cost` INTEGER,
            `image` VARCHAR(256));";
            $prep = self::$pdo->prepare($sql);
            self::$pdo->exec($sql);
        } catch (PDOException $exepction) {
            echo "Database error: " . $exepction->getMessage();
        }
    }

    public static function insert($params)
    {
        if (self::$config['enable']) {
            if (!self::$pdo) {
                self::error();
            }
            $sql = "INSERT INTO products (`productname`, `cost`, `image`) VALUES (:productname, :cost, :image);";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute($params);
        } else{
            require_once 'views/errors/500.php';
        }
    }

    public static function select()
    {
        if (self::$config['enable']) {
            if (!self::$pdo) {
                self::error();
            }
            $result = [];
            $sql = "SELECT * FROM products";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute();
            $products = $stmt->fetchAll();
            return $products;
        } else{
            require_once 'views/errors/500.php';
        }
    }

    public static function delete($params)
    {
        if (self::$config['enable']) {
            if(!self::$pdo){
                self::error();
            }
            $arr = [
                "q" => $params['q'],
                "id" => $params['id']
            ];
            $sql = "DELETE FROM products WHERE `id` = ?";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([$params['id']]);
            Router::redirect('/admin');
        }
    }

    public static function update_with_image($params){
        if (self::$config['enable']) {
            if(!self::$pdo){
                self::error();
            }
        }
        $sql = "UPDATE products SET productname = :productname, cost = :cost, image = :image WHERE id = :id";
        $stmt = self::$pdo->prepare($sql);
        $stmt->bindValue(":productname", $params['productname']);
        $stmt->bindValue(":cost", $params['cost']);
        $stmt->bindValue(":image", $params['image']);
        $stmt->bindValue(":id", $params['id']);
        $stmt->execute();

    }

    public static function update_without_image($params){
        if (self::$config['enable']) {
            if(!self::$pdo){
                self::error();
            }

            $sql = "UPDATE products SET productname = :productname, cost = :cost WHERE id = :id";
            $stmt = self::$pdo->prepare($sql);
            $stmt->bindValue(':productname', $params['productname']);
            $stmt->bindValue(':cost', $params['cost']);
            $stmt->bindValue(':id', $_SESSION['product']['id']);
            $stmt->execute();
        }

    }

    private static function error()
    {
        die("Error database connect");
    }
}