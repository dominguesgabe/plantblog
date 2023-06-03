<?php

namespace app\controllers;

use app\core\TemplateMachine;
use app\templates\Template;
use TemplateNames;

class Home
{
    public function index()
    {
        $template = new Template();
        return $template->indexHome();
    }
    public function show(array $params)
    {
        var_dump($params);
    }
}