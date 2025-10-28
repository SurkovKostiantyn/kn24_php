<?php

namespace Classes;

use Classes\Viewer;

class HomePageController{

    public function __construct(){

    }

    public function show(){

        $param = ['title' => 'Головна'];

        Viewer::show('home',$param);
    }
}