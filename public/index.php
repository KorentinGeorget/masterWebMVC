<?php

require __DIR__ . '/../vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

$parts = explode('/', trim($uri, '/'));

$controllerName = !empty($parts[0]) ? ucfirst($parts[0]) . 'Controller' : 'HomeController';
$actionName = $parts[1] ?? 'index';
$id = $parts[2] ?? null;

$controllerClassName = 'App\\Controllers\\' . $controllerName;

if (class_exists($controllerClassName)) {
    $controller = new $controllerClassName();
    if (method_exists($controller, $actionName)) {
        if ($id) {
            $controller->$actionName($id);
        } else {
            $controller->$actionName();
        }
    } else {
        http_response_code(404);
        echo "Action not found";
    }
} else {
    http_response_code(404);
    echo "Controller not found";
}


