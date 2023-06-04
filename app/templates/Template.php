<?php

namespace app\templates;

use app\core\TemplateMachine;
use app\model\Posts;
use Tables;
use TemplateNames;

class Template
{
    public function render($templateName, $params)
    {
        return new TemplateMachine($templateName, $params);
    }

    public function indexHome()
    {
        $postsModel = new Posts(Tables::POSTS);
        $posts = $postsModel->findAll();
        $lastPost = $postsModel->findLast();

        $params = [];
        $params['posts'] = $posts;
        $params['lastPost'] = $lastPost;

        return $this->render(TemplateNames::APP_HOME, $params);
    }
}