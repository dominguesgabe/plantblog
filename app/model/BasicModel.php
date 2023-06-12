<?php

namespace app\model;

use app\database\Database;

abstract class BasicModel
{
    public string $table;
    public Database $database;

    public function __construct(string $table)
    {
        $this->table = $table;
        $this->database = new Database();
    }

    public function findAll(): array
    {
        return $this->database->select('SELECT * FROM ' . $this->table);
    }

    public function show($id): array
    {
        $params = [
            'id' => $id
        ];

        return $this->database->select('SELECT * FROM ' . $this->table . ' WHERE id = :id', $params);
    }
}