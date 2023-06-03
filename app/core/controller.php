<?php

function loadController(array $mathedUri, array $params)
{
    [$controller, $method] = explode('@', array_values($mathedUri)[0]);

    $namespacedController = CONTROLLER_PATH . $controller;

    if (!class_exists($namespacedController)) {
        throw new Exception("Controller $controller do not exist");
    }

    $controllerInstance = new $namespacedController;

    if (!method_exists($controllerInstance, $method)) {
        throw new Exception("Method $method do not exist on class $controller");
    }

    $controllerInstance->$method($params);
}