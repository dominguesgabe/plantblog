<?php

namespace app\router;

use app\helpers\AppConfigConstants;
use CoffeeCode\Router\Router;
use Kint;

class AppRouter
{
    public function __construct()
    {
        $router = new Router(AppConfigConstants::URL_BASE);
    //$router->namespace("app\controllers\\");

        $router->group(null);
        $router->get('/', 'app\controllers\HomeController:index');
        $router->get('/ler/{id}', 'app\controllers\HomeController:show');
        $router->post('/buscar', 'app\controllers\HomeController:query');


        $router->group('error');
        $router->get('/{errorCode}', function($data) {
            Kint::dump("ocorreu um erro {$data['errorCode']}");
        });

        $router->dispatch();
    }
}