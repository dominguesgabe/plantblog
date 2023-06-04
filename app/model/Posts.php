<?php

namespace app\model;

class Posts extends BasicModel
{
    public function findLast(): array
    {
        return $this->database->select('SELECT * FROM ' . $this->table . ' ORDER BY id DESC LIMIT 1 ')[0];
    }
}