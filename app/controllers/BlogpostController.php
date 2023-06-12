<?php

namespace app\controllers;

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

    public function store($fomData)
    {
        $blogpostModel = new Blogposts(TableNameConstants::POSTS);

        try {
            $blogpostModel->store($fomData);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}