<?php

namespace App\Controllers;
use App\Core\App;

class UsersController
{
    public function showOneUser()
    {
        check_auth();

        $id = $_GET['id'];
        // contact db and get a user
        $user = App::get('database')->selectOne('users',$id);

        return view('user',compact('user'));
    }

    public function showUsers()
    {
        check_auth();

        $users = App::get('database')->selectAll('users');

        return view('allUsers',compact('users'));
    }

    /** Api example - do not use in production */
    public function getUsersApi()
    {
        $users = App::get('database')->selectAll('users');

        $mappedUsers = array_map(function($user){
                unset($user->password);
                return $user;
        },$users);

        echo json_encode($mappedUsers);
    }

    public function delete()
    {
        check_auth();

        $id = $_GET['id']; // todo what is the param is not submitted, or its wrong type

        $user = App::get('database')->selectOneByField('users',['id'=>$id]);
        if(!$user || $user->email === 'admin@admin.com'){
            return redirect('/users');
        }

        App::get('database')->delete('users',$id);

        redirect("/users");
    }

    public function showEditUserPage()
    {
        check_auth();

        $id = $_GET['id'];
        $user = App::get('database')->selectOne('users',$id);

        if(!$user || $user->email === 'admin@admin.com'){
            return redirect('/users');
        }
        return view('userEdit',compact('user'));
    }

    public function update()
    {
        check_auth();

        $id = $_POST['id'];

        $data = [
            'id'=>$id,
            'name'=>$_POST['name'],
            'email'=>$_POST['email']
        ];

        $user = App::get('database')->selectOneByField('users', ['id'=>$id]);
        if(!$user || $user->email === 'admin@admin.com'){
            return redirect('/users');
        }

        App::get('database')->update('users',$data);

        return redirect('/users');
    }


    public function getStudents()
    {
        $students = App::get('database')->selectAll('users');
        $classes = App::get('database')->selectAll('classes');

        $newStudents = [];
        foreach ($students as $student){
            $newStudents[$student->id] = $student;
            $newStudents[$student->id]->classes = [];
        }
        $students = $newStudents;

        $newClasses = [];
        foreach ($classes as $class){
            $newClasses[$class->id] = $class;
        }
        $classes = $newClasses;


        $user_class_tb = App::get('database')->selectAll('user_class');
        foreach ($user_class_tb as $row){
            $students[$row->user_id]->classes[] = $classes[$row->class_id];
        }

        return view('students',compact('students'));

    }
}