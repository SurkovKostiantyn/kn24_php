<?php
    require '../vendor/autoload.php';
    use Classes\Application;
    use Classes\HomePageController;
    
    $app = new Application();

    $dispatcher = FastRoute\simpleDispatcher(function(FastRoute\ConfigureRoutes $r) {
        $r->addRoute('GET', '/', [HomePageController::class, 'show']);
        //$r->addRoute('GET', '/login', 'handler');
    });

    // Fetch method and URI from somewhere
    $httpMethod = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['REQUEST_URI'];

    // Strip query string (?foo=bar) and decode URI
    if (false !== $pos = strpos($uri, '?')) {
        $uri = substr($uri, 0, $pos);
    }
    $uri = rawurldecode($uri);

    $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
    switch ($routeInfo[0]) {
        case FastRoute\Dispatcher::NOT_FOUND:
            echo 'немає такої сторінки';
            break;
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            $allowedMethods = $routeInfo[1];
            echo '405 Method Not Allowed';
            break;
        case FastRoute\Dispatcher::FOUND:
            [$class, $method] = $routeInfo[1];
            $vars = $routeInfo[2];
        
            $controller = new $class();
            call_user_func_array([$controller, $method], $vars);
            break;
    }