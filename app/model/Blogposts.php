<?php

namespace app\model;

class Blogposts extends BasicModel
{
    public function findBlogposts($searchTerm): array
    {
        return $this->database->select('SELECT * FROM ' . $this->table . ' WHERE title LIKE "%' . $searchTerm . '%"');
    }

    public function store($formData)
    {

    }
}