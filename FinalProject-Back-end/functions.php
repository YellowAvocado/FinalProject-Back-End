<?php

function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function view($name, $data = []){
    extract($data);
    require "views/{$name}.view.php";
}

function redirect($uri){
    header("Location: {$uri}");
}

function check_auth(){
    if(!isset($_SESSION['user'])){
        return redirect('/login');
    }
}