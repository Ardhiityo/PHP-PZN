<?php

namespace Arya\Mvc\App;

require_once __DIR__ . "/../Controller/HomeController.php";
require_once __DIR__ . "/../Controller/ProductController.php";
require_once __DIR__ . "/../Middleware/Auth.php";

class Router {
    static private array $router = [];
    
    public static function add (string $method, string $path, string $controller, string $function, array $middlewares = []): void {
        self::$router[] = [
          "method" => $method,
          "path"=> $path,
          "controller" => $controller,
          "function" => $function,
          "middleware"=> $middlewares
        ];
    }
    
    public static function run () {
        $path = "/";
        $method = $_SERVER["REQUEST_METHOD"];
        
        if(isset($_SERVER["PATH_INFO"])) {
            $path = $_SERVER["PATH_INFO"];
        }
        
        foreach (self::$router as $route) {
            $pattern = "#^" . $route["path"] ."$#";
            if($route["method"] == $method && preg_match($pattern, $path, $variables)) {

                foreach ($route["middleware"] as $middleware) {
                    $middlewareClass = new $middleware();
                    $middlewareClass->before();
                };
                
                $function = $route["function"];
                
                $controllerClass = $route["controller"];
                
                $controller = new $controllerClass();
                array_shift($variables);
                
                call_user_func_array([$controller, $function], $variables);
                
                return;
            }
            
        }
    
        http_response_code(404);
        echo "PATH NOT FOUND";    
    
    }
}