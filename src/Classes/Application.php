<?php

    namespace Classes;

    class Application{

        public function __construct(){
            $this->Sayhello();
        }

        public function Sayhello() : void{
            echo 'Hello';
        }

    }