<?php

namespace Classes;

use Classes\Viewer;

class LoginController{
    
    public function show(){
        session_start();
        
        $error = $_SESSION['login_error'] ?? null;
        unset($_SESSION['login_error']); // Видаляємо повідомлення після відображення

        Viewer::show('login', [
            'title' => 'Вхід',
            'error' => $error,
        ]);
    }
}