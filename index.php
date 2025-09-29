<?php

    


    // масив з маршрутами, title сторінок, назва файлу
    // Маршрути
    $routes = [
        "/" => ["title" => "ГОЛОВНА",   "file" => "home.php"],
        "/page1" => ["title" => "СТОРІНКА 1", "file" => "page1.php"],
        "/page2" => ["title" => "СТОРІНКА 2", "file" => "page2.php"],
        "/page3" => ["title" => "СТОРІНКА 3", "file" => "page3.php"],
    ];

    // 1) Беремо лише PATH без параметрів (?a=b)
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // 2) Якщо додаток у підпапці — відрізаємо базовий префікс
    $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    if ($base && $base !== '/' && str_starts_with($path, $base)) {
        $path = substr($path, strlen($base));
        if ($path === '' || $path === false) $path = '/';
    }

    // 3) Нормалізація шляху
    $path = rtrim($path, '/');
    if ($path === '') $path = '/';

    // 4) Вважаємо /index.php головною сторінкою
    if ($path === '/index.php') {
        $path = '/';
    }

    // Роутинг
    if (isset($routes[$path])) {
        $title = $routes[$path]['title'];
        include "pages/" . $routes[$path]['file'];
    } else {
        http_response_code(404);
        $title = "Сторінка не знайдена";
        include "pages/404.php";
    }


