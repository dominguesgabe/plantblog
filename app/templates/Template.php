<?php

namespace app\templates;

use app\core\TemplateMachine;
use TemplateNames;

class Template
{
    public function render($templateName, $params)
    {
        return new TemplateMachine($templateName, $params);
    }

    public function indexHome()
    {
        $params = [];
        return $this->render(TemplateNames::APP_HOME, $params);
    }
}