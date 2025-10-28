<?php

namespace Classes;

use Classes\Viewer;

class HomePageController{
    public function show(){

        $user = $_SESSION['login'] ?? null;

        Viewer::show('home', [
            'title' => 'Головна сторінка',
            'user' => $user
        ]);
    }
}