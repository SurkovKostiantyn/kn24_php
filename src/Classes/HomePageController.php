<?php

namespace Classes;

use Classes\Viewer;

class HomePageController{
    public function show(){
        session_start();

        Viewer::show('home', [
            'title' => 'Головна сторінка',
        ]);
    }
}