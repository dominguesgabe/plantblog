<?php

namespace app\views;

use app\core\TemplateMachine;
use app\helpers\TableNameConstants;
use app\helpers\Tables;
use app\model\Blogposts;
use app\helpers\TemplateNamesConstants;
use app\model\Users;

class BlogpostView extends View
{
    public function indexHome(): TemplateMachine
    {
        $postsModel = new blogposts(TableNameConstants::POSTS);
        $posts = $postsModel->findAll();

        $params = [];
        $params['posts'] = $posts;

        return $this->render(TemplateNamesConstants::APP_HOME, $params);
    }

    public function show(int $blogpostId): TemplateMachine
    {
        $postsModel = new blogposts(TableNameConstants::POSTS);
        $post = $postsModel->show($blogpostId)[0];

        $usersModel = new Users(TableNameConstants::USERS);
        $creatorName = $usersModel->findUserNameById($post['user_id'])[0]['name'];

        $params['post'] = $post;
        $params['creatorName'] = $creatorName;

        return $this->render(TemplateNamesConstants::BLOGPOST_SHOW, $params);
    }

    public function create(): TemplateMachine
    {
        return $this->render(TemplateNamesConstants::BLOGPOST_CREATE, []);
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