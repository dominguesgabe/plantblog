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
        $router->post('/delete/{id}', 'app\controllers\BlogpostController:destroy');

        $router->group('criar');
        $router->get('/', 'app\controllers\BlogpostController:create');
        $router->post('/', 'app\controllers\BlogpostController:store');

        $router->group('usuario');
        $router->get('/{userId}', 'app\controllers\UserController:show');

        $router->group('erro');
        $router->get('/{errorCode}', function($data) {
            Kint::dump("ocorreu um erro {$data['errorCode']}");
        });

        $router->dispatch();
    }
}