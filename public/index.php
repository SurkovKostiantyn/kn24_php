<?php
    require __DIR__ .'/../vendor/autoload.php';
    
    use Pecee\SimpleRouter\SimpleRouter;
    use Pecee\Http\Request;

    use Classes\HomePageController;


    SimpleRouter::get('/', [HomePageController::class, 'show']);

    // --- обробка помилок ---
    SimpleRouter::error(function(Request $request, \Exception $exception) {
        if($exception instanceof \Pecee\SimpleRouter\Exceptions\NotFoundHttpException) {
            http_response_code(404);
            include __DIR__ . '/../src/templates/404.php';
        }
    });

 
    // Запуск маршрутизатора
    SimpleRouter::start();