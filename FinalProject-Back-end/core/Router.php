<?php

namespace App\Core;

class Router
{
    protected $routes;

    public function define($routes){
        $this->routes = $routes;
    }

    public function get($uri,$controller){
        $uri = trim($uri,'/');
        $this->routes["GET"][$uri] = $controller;
    }

    public function post($uri,$controller){
        $uri = trim($uri,'/');
        $this->routes["POST"][$uri] = $controller;
    }

    public function direct($uri,$method){
        if(array_key_exists($uri,$this->routes[$method])){

            $this->callAction(
                ...explode('@',$this->routes[$method][$uri])
            );
        } else {
            return view('404');
        }
    }

    public function callAction($controller,$action)
    {
        $controller = "App\\Controllers\\{$controller}";

        $controller = new $controller;

        if(!method_exists($controller,$action)){
            throw new \ErrorException("Controller does not support the {$action} action");
        }

        return $controller->$action();
    }

    public static function load($file){
        $router = new static;

        require $file;

        return $router;
    }
}