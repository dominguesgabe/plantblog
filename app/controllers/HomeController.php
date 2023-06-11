<?php

namespace app\controllers;

use app\core\TemplateMachine;
use app\views\BlogpostView;

class HomeController
{
    private BlogpostView $template;

    public function __construct()
    {
        $this->template = new BlogpostView();
    }

    public function index(): TemplateMachine
    {
        return $this->template->indexHome();
    }
    public function show(array $params): TemplateMachine
    {
        $blogpostId = $params['id'];

        return $this->template->show($blogpostId);
    }
    public function query(array $params): TemplateMachine
    {
        $searchTerm = $params['search'];

        if (!$searchTerm) {
            return $this->index();
        }

        return $this->template->queryBlogposts($searchTerm);
    }
}