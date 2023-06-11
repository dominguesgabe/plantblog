<?php

namespace app\views;

use app\core\TemplateMachine;
use app\helpers\TableNameConstants;
use app\helpers\Tables;
use app\model\Blogposts;
use app\helpers\TemplateNamesConstants;

class BlogpostView
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

    public function show($blogpostId)
    {
        $postsModel = new blogposts(TableNameConstants::POSTS);
        $post = $postsModel->show($blogpostId)[0];

        $params['post'] = $post;

        return $this->render(TemplateNamesConstants::APP_SHOW, $params);
    }

    public function queryBlogposts($searchTerm)
    {
        $postsModel = new blogposts(TableNameConstants::POSTS);
        $posts = $postsModel->findBlogposts($searchTerm);

        $params = [];

        $params['posts'] = $posts;
        $params['searchTerm'] = $searchTerm;

        return $this->render(TemplateNamesConstants::APP_SEARCH, $params);
    }
}