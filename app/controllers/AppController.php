<?php

namespace app\controllers;

use app\core\TemplateMachine;
use app\views\BlogpostView;

class AppController
{
    public function index($params): TemplateMachine
    {
        $template = new BlogpostView();
        return $template->indexHome();
    }
    public function show(array $params)
    {
        var_dump($params);exit();
    }
    public function search()
    {
        var_dump('no');exit();
    }
}