<?php

namespace app\core;

use app\helpers\ControllerPathConstants;
use Exception;

class ControllerLoader
{
    public static function load(array $mathedUri, array $params): void
    {
        [$controller, $method] = explode('@', array_values($mathedUri)[0]);

        $namespacedController = ControllerPathConstants::CONTROLLER_PATH . $controller;

        if (!class_exists($namespacedController)) {
            throw new Exception("Controller $controller do not exist");
        }

        $controllerInstance = new $namespacedController;

        if (!method_exists($controllerInstance, $method)) {
            throw new Exception("Method $method do not exist on class $controller");
        }

        $controllerInstance->$method($params);
    }
}