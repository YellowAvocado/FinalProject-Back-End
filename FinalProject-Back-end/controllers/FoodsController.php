<?php

namespace App\Controllers;

use App\Core\App;

class FoodsController
{

    public function getMoodApi()
    {

        $mood = App::get('database')->selectAll('mood');


        echo json_encode($mood);
    }

    public function getFoodApi()
    {

        $food = App::get('database')->selectAll('food');

        echo json_encode($food);
    }

    public function getMoodId()
    {

        $mood_id = $_GET['id'];
        $params = [
            'id' => $mood_id
        ];

        $moods = App::get('database')->selectAllByField("mood", $params);

        echo json_encode($moods);


    }

    public function showMoods()
    {
//        check_auth();

        $moods = App::get('database')->selectAll('moods');

        return view('Allmoods', compact('moods'));
    }

    public function showOneMood()
    {
//        check_auth();

        $id = $_GET['id'];
        $mood = App::get('database')->selectOne('moods', $id);

        return view('mood', compact('mood'));
    }

    public function showEditMoodPage()
    {
//        check_auth();

        $id = $_GET['id'];
        $mood = App::get('database')->selectOne('moods', $id);

        return view('moodEdit', compact('mood'));
    }

    public function update()
    {
//        check_auth();

        $id = $_POST['id'];

        $data = [
            'id' => $id
        ];

        $movies = App::get('database')->selectOneByField('moods', ['id' => $id]);


        App::get('database')->update('moods', $data);

        return redirect('/moods');
    }

    public function deleteMood()
    {
        check_auth();

        $id = $_GET['id'];
        $mood = App::get('database')->selectOneByField('mood', ['id' => $id]);


        App::get('database')->delete('mood', $id);

        redirect("/moods");
    }

    public function insert()
    {
        check_auth();


        App::get('database')->insert('moods', [
            'mood' => $_POST['mood'],
        ]);

        return redirect('/moods');

    }
}
