<?php

namespace Arya\Mvc\App;

class View {
    public static function render(string $view, $model = []) {
        require __DIR__ . "/../Views/" . $view . ".php";
    }
    
    public static function redirect(string $url) {
        header("Location: $url");
        if(getenv("mode") != "test") {
            exit();
        }
    }
}