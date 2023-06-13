<?php

namespace app\controllers;

use app\core\TemplateMachine;
use app\views\UserView;

class UserController
{
    private UserView $template;

    public function __construct()
    {
        $this->template = new UserView();
    }

    public function show(array $params): TemplateMachine
    {
        $userId = $params['userId'];
        return $this->template->show($userId);
    }
}