<?php

use app\router\Router;

require 'bootstrap.php';

try {
    $router = new Router();
} catch (Exception $e) {
    var_dump($e->getMessage());
}
