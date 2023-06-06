<?php

namespace app\templates;

use app\core\TemplateMachine;
use app\helpers\TableNameConstants;
use app\helpers\Tables;
use app\model\Blogposts;
use app\helpers\TemplateNamesConstants;

class Template
{
    public function render($templateName, $params)
    {
        return new TemplateMachine($templateName, $params);
    }

    public function indexHome()
    {
        $postsModel = new blogposts(TableNameConstants::POSTS);
        $posts = $postsModel->findAll();

        $params = [];
        $params['posts'] = $posts;

        return $this->render(TemplateNamesConstants::APP_HOME, $params);
    }
}