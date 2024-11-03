<?php

use Arya\Mvc\App\Router;
use Arya\Mvc\Controller\HomeController;
use Arya\Mvc\Controller\ProductController;
use Arya\Mvc\Middleware\Auth;

require_once __DIR__ . "/../src/App/Router.php";

Router::add("GET", "/", HomeController::class, "index");

Router::add("GET", "/hello", HomeController::class, "hello", [Auth::class]);

Router::add("GET", "/world", HomeController::class, "world", [Auth::class]);

Router::add("GET", "/product/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)", ProductController::class, "categories");

Router::run();
