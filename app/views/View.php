<?php

namespace app\views;

use app\core\TemplateMachine;

abstract class View
{
    public function render($templateName, $params): TemplateMachine
    {
        return new TemplateMachine($templateName, $params);
    }
}