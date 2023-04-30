<?php

// PagesController routes
$router->get('','PagesController@home');

/** User routes */
$router->get('users/show','UsersController@showOneUser');
$router->get('users','UsersController@showUsers');
$router->get('users/edit','UsersController@showEditUserPage');
$router->get('delete','UsersController@delete');
$router->post('users/edit','UsersController@update');

$router->get('/students','UsersController@getStudents');

/** Auth routes */
$router->get('register','AuthController@showRegisterForm');
$router->get('/login','AuthController@showLoginPage');
$router->get('/logout','AuthController@logout');

$router->post('register','AuthController@register');
$router->post('login','AuthController@login');




//routs
$router->get('moods','FoodsController@showMoods');
$router->get('moods/show','FoodsController@showOneMood');
$router->get('moods/edit','FoodsController@showEditMoodPage');
$router->get('foods/delete','FoodsController@deleteMood');

$router->post('foods/insert', 'FoodsController@insert');
$router->post('foods/edit','FoodsController@update');

//api routes
$router->get('api/food',"FoodsController@getFoodApi");
$router->get('api/mood','FoodsController@getMoodApi');
$router->get('api/moodById','FoodsController@getMoodId');

/** Api routes */
$router->get('api/users',"UsersController@getUsersApi");

/** Classes routes */
$router->get('/classes','ClassesController@showClasses');