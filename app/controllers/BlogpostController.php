<?php

namespace app\controllers;

use app\core\TemplateMachine;
use app\helpers\TableNameConstants;
use app\model\Blogposts;
use app\views\BlogpostView;
use Exception;

class BlogpostController
{
    private BlogpostView $template;

    public function __construct()
    {
        $this->template = new BlogpostView();
    }
    public function create()
    {
        return $this->template->create();
    }

    public function store(array $fomData): TemplateMachine
    {
        $blogpostModel = new Blogposts(TableNameConstants::POSTS);

        try {
            $blogpostModel->store($fomData);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function destroy(array $params)
    {
        $blogpostModel = new Blogposts(TableNameConstants::POSTS);

        try {
            return $blogpostModel->destroy($params['id']);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}