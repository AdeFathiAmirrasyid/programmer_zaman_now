<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Mvc\BelajarPhpMvc\App\Router;
use Mvc\BelajarPhpMvc\Controller\HomeController;
use Mvc\BelajarPhpMvc\Controller\ProductController;
use Mvc\BelajarPhpMvc\Middleware\AuthMiddleware;

Router::add('GET', '/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)', ProductController::class, 'categories');


Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/hello',  HomeController::class, 'hello', [AuthMiddleware::class]);
Router::add('GET', '/world',  HomeController::class, 'world', [AuthMiddleware::class]);

Router::run();
