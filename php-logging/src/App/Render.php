<?php

namespace Arya\Mvc\App;

class Render {
    public static function render(string $view, $model) {
        require __DIR__ . "/../Views/" . $view . ".php";
    }
}