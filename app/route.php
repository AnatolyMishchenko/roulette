<?php

class Route
{
    static function start()
    {
        $controllerName = 'Roulette';
        $actionName = 'index';
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if (!empty($routes[1])) {
            $actionName = $routes[1];
        }
        $controllerPath = 'app/controllers/' . $controllerName . 'Controller.php';
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
        } else {

            return false;
        }
        $controllerName = $controllerName . 'Controller';
        $controller = new $controllerName;
        $action = $actionName;
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {

            return false;
        }
    }
}

