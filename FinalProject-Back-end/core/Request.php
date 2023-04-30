<?php

namespace App\Core;

class Request
{
    public static function uri()
    {
        $uri = isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : $_SERVER["REQUEST_URI"];

        return trim($uri, "/");
    }

    public static function method(){
        return $_SERVER['REQUEST_METHOD'];
    }
}