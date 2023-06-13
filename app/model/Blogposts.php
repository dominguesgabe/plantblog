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

    public function findBlogpostsByUser(int $userId): array
    {
        return $this->database->select('SELECT id, title, description, created_at FROM ' . $this->table . ' WHERE user_id = :userId ORDER BY created_at DESC', ['userId' => $userId]);
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