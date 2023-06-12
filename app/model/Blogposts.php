<?php

namespace app\model;

use app\core\TemplateMachine;
use app\views\BlogpostView;
use Exception;

class Blogposts extends BasicModel
{
    public function findBlogposts(string $searchTerm): array
    {
        return $this->database->select('SELECT * FROM ' . $this->table . ' WHERE title LIKE "%' . $searchTerm . '%"');
    }

    public function store(array $formData): TemplateMachine
    {
        try {
            $this->database->insert($formData, $this->table);
            $lastId = $this->database->lastInsertId($this->table);

            $blogpostView = new BlogpostView();

            return $blogpostView->show($lastId);

        } catch (Exception $e) {
            throw new Exception('Error while writing post');
        }
    }
}