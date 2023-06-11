<?php

namespace app\controllers;

use app\core\TemplateMachine;
use app\views\BlogpostView;

class HomeController
{
    public function index(): TemplateMachine
    {
        $template = new BlogpostView();
        return $template->indexHome();
    }
    public function show(array $params): TemplateMachine
    {
        $blogpostId = $params['id'];

        $template = new BlogpostView();
        return $template->show($blogpostId);
    }
    public function query(array $params): TemplateMachine
    {
        $searchTerm = $params['search'];

        if (!$searchTerm) {
            return $this->index();
        }

        $template = new BlogpostView();
        return $template->queryBlogposts($searchTerm);
    }
}