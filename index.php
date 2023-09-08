<?php

session_start();

use App\Services\AdminDb;
use App\Services\Router;
use App\Services\DB;

require_once __DIR__ . "/vendor/autoload.php";
new DB();
new AdminDb();
require_once __DIR__ . "/router/routes.php";
Router::redirect('/register');
?>