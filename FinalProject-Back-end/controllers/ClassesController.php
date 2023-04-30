<?php

namespace App\Controllers;

use App\Core\App;

class ClassesController
{
    public function showClasses()
    {
        check_auth();

        $classes = App::get('database')->selectAll('classes');
        $users = App::get('database')->selectAll('users');
        $class_user = App::get('database')->selectAll('user_class');


        $classesNew = [];
        foreach ($classes as $class){
            $classesNew[$class->id] = $class;
            $classesNew[$class->id]->students = [];
        }

        $usersNew = [];
        foreach ($users as $user){
            $usersNew[$user->id] = $user;
        }

        foreach ($class_user as $class_user_row){
            $studentToAdd = $usersNew[$class_user_row->user_id];
            $classIdToAddTo = $class_user_row->class_id;

            $classesNew[$classIdToAddTo]->students[] = $studentToAdd;
        }

        $classes = $classesNew;

        return view('allClasses',compact('classes'));

    }
}