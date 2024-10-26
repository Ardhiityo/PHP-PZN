<?php

namespace Arya\Mvc\Controller;

require_once __DIR__ . "/../App/Render.php";
use Arya\Mvc\App\Render;

class HomeController {
    public function index() {
        $model = [
            "title" => "Home",
            "say" => "Hello World"
        ];
        
        Render::render("index", $model);
    }

    public function hello() {
        echo "HomeController.hello()" . PHP_EOL;
    }

    public function world() {
        echo "HomeController.world()" . PHP_EOL;
    }
}