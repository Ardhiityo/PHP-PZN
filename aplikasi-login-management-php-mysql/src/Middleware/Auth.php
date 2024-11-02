<?php

namespace Arya\Mvc\Middleware;

require_once __DIR__ . "/Middleware.php";
use Arya\Mvc\Middleware\Middleware;

class Auth implements Middleware {
    public function before (): void {
        session_start();
        if(!$_SESSION["user"]) {
            header("Location: /login");
            exit;
        }
    }
}