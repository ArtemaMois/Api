<?php

use App\Services\Router;
use App\Controllers\Auth;
use App\Services\AdminDb;
use App\Services\Basket;
use App\Services\Validate;

Router::page('/register', 'register');
Router::page('/login', 'login');
Router::page('/catalog', 'catalog');
Router::page('/admin', 'admin');
Router::page('/add_products', 'add_products');
Router::page('/change', 'change');

Router::post('/auth/register', Auth::class, 'register', true, false);
Router::post('/auth/auth', Auth::class, 'auth', true, false);
Router::post('/auth/exit', Auth::class, 'exit', true, false);
Router::post('/validate/valid', Validate::class, 'valid', true, true);
Router::post('/validate/update', Validate::class, 'update', true, true);
Router::get('/basket/in_basket', Basket::class, 'in_basket', true, false);
Router::get('/adminDb/delete',AdminDb::class, 'delete', true, false);


Router::enable();