<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

$path = parse_url($uri, PHP_URL_PATH);
$parts = explode('/', trim($path, '/'));

$mainRoute = !empty($parts[0]) ? $parts[0] : 'home';

// On gère les 3 routes de login / register/ logout
if ($mainRoute === 'login') {
    $controller = new \App\Controllers\AuthController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->processLogin();
    } else {
        $controller->showLoginForm();
    }
} elseif ($mainRoute === 'register') {
    $controller = new \App\Controllers\AuthController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->processRegister();
    } else {
        $controller->showRegisterForm();
    }
} elseif ($mainRoute === 'logout') {

    $controller = new \App\Controllers\AuthController();
    $controller->logout();

} else {

// Puis toutes les autres routes
    $controllerName = ucfirst($mainRoute) . 'Controller';
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
            echo "Action '$actionName' not found in controller '$controllerClassName'";
        }
    } else {
        http_response_code(404);
        // J'améliore le message d'erreur pour vous aider à déboguer
        echo "Controller class '$controllerClassName' not found";
    }
}