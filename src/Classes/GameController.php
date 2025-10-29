<?php

namespace Classes;

use Classes\Database;

class GameController{

    public function show(){

        // 1. Підключення та створення БД
        $conn = Database::connect();
        if ($conn) {
            echo "Підключення успішно встановлено і БД готова.<br>";
        }

        // 4. Отримання даних (використовуємо метод select)
        $gamesList = Database::select("SELECT id, title, description FROM games");


        Viewer::show('game', [
            'title' => 'Cторінка ігр',
            'gamesList' => $gamesList
        ]);
    }
}