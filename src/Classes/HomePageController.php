<?php

namespace Classes;

class HomePageController{

    public function __construct(){

    }

    public function show(){
        include './templates/home.php';
    }
}