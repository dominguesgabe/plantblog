<?php

namespace app\model;

class Users extends BasicModel
{
    public function findUserNameById($userId): array
    {
        return $this->database->select('SELECT name FROM ' . $this->table . ' WHERE id = ' . $userId);
    }
}