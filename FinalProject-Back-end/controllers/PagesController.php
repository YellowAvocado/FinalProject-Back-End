<?php

namespace App\Controllers;
use App\Core\App;

class PagesController
{
    public function home()
    {
//        check_auth();
//        $tasks = App::get('database')->selectAll('tasks');
//        $users = App::get('database')->selectAll('users');
//
//        foreach ($tasks as $task){
//            foreach ($users as $user){
//
//                if($user->id === $task->user_id){
//                    unset($user->password);
//                    $task->user = $user;
//                    break;
//                }
//            }
//        }
//
//        return view('index',compact('tasks'));
        return view('index');
    }
}