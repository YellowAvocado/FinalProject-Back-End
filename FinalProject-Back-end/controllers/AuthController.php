<?php

namespace App\Controllers;
use App\Core\App;

class AuthController
{

    public function showLoginPage()
    {
        /**
         * redirect user to '/' if they are logged in. Otherwise, return view for login
         */
        if(isset($_SESSION['user'])){
            return redirect('/');
        }
        return view('login');
    }

    public function showRegisterForm()
    {
        check_auth();

        return view('register');
    }

    public function register()
    {
        check_auth();

        if(empty($_POST['password']) || strlen($_POST['password']) < 5){
            return redirect('/register');
        }
        $pass = trim($_POST['password']);
        $hash = hash('sha256',$pass);


        // repeated password to check original
        if(!isset($_POST['repeatpassword'])){
            return redirect('/register');
        }
        $passRepeat = $_POST['repeatpassword'];
        $passRepeat = trim($passRepeat);
        $repeatHash = hash('sha256',$passRepeat);

        if($hash != $repeatHash){
            return redirect('/register');
        }

        // name validation
        if(!isset($_POST['name'])){
            return redirect('/register');
        }

        $name = trim($_POST['name']);

        if(strlen($name) < 3){
            return redirect('/register');
        }

        // email validation and sanitization
        if(!isset($_POST['email'])){
            return redirect('/register');
        }

        $email = trim($_POST['email']);

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return redirect('/register');
        }

        // data to submit
        $data = [
            'name'=>$name,
            'email'=>$email,
            'password'=>$hash
        ];

        App::get('database')->insert('users',$data);

        redirect('/users');
    }

    public function login()
    {
        // password check
        if(empty($_POST['password'])){
            redirect('/login');
        }
        $pass = trim($_POST['password']);
        $hash = hash('sha256',$pass);

        // email check
        if(!isset($_POST['email'])){
            return redirect('/login');
        }

        $email = trim($_POST['email']);

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return redirect('/login');
        }

        $params = [
            'email'=>$email,
            'password'=>$hash
        ];

        $user = App::get('database')->selectOneByField('users',$params);

        if($user){
            $_SESSION['user'] = $user;
            unset($_SESSION['user']->password);
            return redirect("/");
        }

        return redirect('/login');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        return redirect('/login');
    }
}