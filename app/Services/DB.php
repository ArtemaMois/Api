<?php

namespace App\Services;

use PDO;
use PDOException;


class DB
{

    private static $config;
    private static $pdo;
    private static $host;
    private static $username;
    private static $password;
    private static $dbname;


    public function __construct()
    {
        self::$config = include 'config/clientdb.php';
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
            $sql = "CREATE DATABASE clientDb";
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
            $sql = "CREATE TABLE users (`id` INTEGER AUTO_INCREMENT PRIMARY KEY, 
            `username` VARCHAR(256), 
            `email` VARCHAR(256) UNIQUE,
            password VARCHAR(256));";
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
            $sql = "INSERT INTO users (`username`, `email`, `password`) VALUES (:username, :email, :password);";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute($params);
        } else{
            require_once 'views/errors/500.php';
        }
    }

    public static function select($params)
    {
        if (self::$config['enable']) {
            if (!self::$pdo) {
                self::error();
            }
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([$params['email']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } else{
            require_once 'views/errors/500.php';
        }
    }

    public static function delete($params)
    {
        if (self::$config['enable'] === true) {
            if(!self::$pdo){
                self::error();
            }
            $sql = "DELETE FROM Users WHERE email = :email, password = :password";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute($params['email'], $params['password']);
        }
    }

    private static function error()
    {
        die("Error database connect");
    }
}
