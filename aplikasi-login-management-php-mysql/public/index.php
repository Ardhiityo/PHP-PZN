<?php

require_once __DIR__ . "/../src/App/Router.php";
require_once __DIR__ . "/../src/Controller/HomeController.php";
require_once __DIR__ . "/../src/Controller/UserController.php";
require_once __DIR__ . "/../src/Middleware/MustLoginMiddleware.php";
require_once __DIR__ . "/../src/Middleware/MustNotLoginMiddleware.php";

use Arya\Mvc\App\Router;
use Arya\Mvc\Controller\HomeController;
use Arya\Mvc\Controller\UserController;
use Arya\Mvc\Middleware\MustLoginMiddleware;
use Arya\Mvc\Middleware\MustNotLoginMiddleware;

Router::add("GET", "/", HomeController::class, "index");

Router::add("GET", "/users/register", UserController::class, "register", [MustNotLoginMiddleware::class]);

Router::add("POST", "/users/register", UserController::class, "restoreRegister", [MustNotLoginMiddleware::class]);

Router::add("GET", "/users/login", UserController::class, "login", [MustNotLoginMiddleware::class]);

Router::add("GET", "/users/logout", UserController::class, "logout", [MustLoginMiddleware::class]);

Router::add("GET", "/users/profile", UserController::class, "profile", [MustLoginMiddleware::class]);

Router::add("GET", "/users/password", UserController::class, "password", [MustLoginMiddleware::class]);

Router::add("POST", "/users/password", UserController::class, "restorePassword", [MustLoginMiddleware::class]);

Router::add("POST", "/users/profile", UserController::class, "restoreProfile", [MustLoginMiddleware::class]);

Router::add("POST", "/users/login", UserController::class, "restoreLogin", [MustNotLoginMiddleware::class]);

Router::run();
