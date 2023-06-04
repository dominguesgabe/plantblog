<?php

namespace app\model;

class Users extends BasicModel
{
    public function findUserId(): array
    {
        return $this->database->select('SELECT id FROM ' . $this->table)[0];
    }
}