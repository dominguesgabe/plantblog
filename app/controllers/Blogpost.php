<?php

namespace app\controllers;

use app\templates\Template;

class Blogpost
{
    public function index()
    {
        $template = new Template();
        return $template->indexHome();
    }
    public function show(array $params)
    {
        var_dump($params);exit();
    }
}