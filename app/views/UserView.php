<?php

namespace app\views;

use app\core\TemplateMachine;
use app\helpers\TableNameConstants;
use app\helpers\Tables;
use app\model\Blogposts;
use app\helpers\TemplateNamesConstants;
use app\model\Users;

class UserView extends View
{
    public function show(string $userId): TemplateMachine
    {
        $usersModel = new Users(TableNameConstants::USERS);
        $user = $usersModel->show($userId)[0];

        $blogpostsModel = new Blogposts(TableNameConstants::POSTS);

        $userBlogposts = $blogpostsModel->findBlogpostsByUser($userId);

        $params['user'] = $user;
        $params['blogposts'] = $userBlogposts;

        return $this->render(TemplateNamesConstants::USER_SHOW, $params);
    }

}