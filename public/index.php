<?php
    require __DIR__ .'/../vendor/autoload.php';
    
    use Pecee\SimpleRouter\SimpleRouter;
    use Pecee\Http\Request;
    use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;

    use Classes\HomePageController;


    SimpleRouter::get('/', [HomePageController::class, 'show']);

    // --- обробка помилок ---
    SimpleRouter::error(function(Request $r, \Exception $e) {
        if($e instanceof NotFoundHttpException) {
            http_response_code(404);
            include __DIR__ . '/../src/templates/404.php';
        }
    });

     // Запуск маршрутизатора
    SimpleRouter::start();