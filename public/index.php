<?php
    require __DIR__ .'/../vendor/autoload.php';

    session_start();
          
    // маршрутизатор
    use Pecee\SimpleRouter\SimpleRouter;
    use Pecee\Http\Request;
    use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;

    use Classes\HomePageController;
    use Classes\ErrorController;
    use Classes\LoginController;
    use Classes\AuthController;
    use Classes\GameController;

    // прописуємо маршрути
    SimpleRouter::get('/', [HomePageController::class, 'show']);
    SimpleRouter::get('/login', [LoginController::class, 'show']);
    SimpleRouter::get('/logout', [AuthController::class, 'logout']);
    SimpleRouter::post('/login', [AuthController::class, 'login']);
    
    // робимо нову сторінку
    SimpleRouter::get('/game', [GameController::class, 'show']);

    // --- обробка помилок ---

    SimpleRouter::error(function(Request $r, \Exception $e) {
        if ($e instanceof NotFoundHttpException) {
            ErrorController::show404();
        } elseif ($e->getCode() === 403) {
            ErrorController::show403($e);
        } else {
            ErrorController::show500($e);
        }
        exit;
    });

     // Запуск маршрутизатора
    SimpleRouter::start();