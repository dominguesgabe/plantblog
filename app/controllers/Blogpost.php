<?php

namespace app\controllers;

use app\core\TemplateMachine;
use app\views\BlogpostView;

class Blogpost
{
    public function query(array $params)
    {
        \Kint::dump(filter_input(INPUT_GET, 'query'));
        var_dump($params);exit();
    }
}