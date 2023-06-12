<?php

namespace app\database;

use app\helpers\DatabaseConstants;
use Exception;
use PDO;

class Database
{
    private $conn;

    private function connectDatabase()
    {
        try {

            $this->conn = new PDO(
                'mysql:'
                        . 'host=' . DatabaseConstants::SERVER . ';'
                        . 'dbname=' . DatabaseConstants::DATABASE . ';'
                        . 'charset=' . DatabaseConstants::CHARSET,
                        DatabaseConstants::USER,
                        DatabaseConstants::PASSWORD,
                        [PDO::ATTR_PERSISTENT => true]
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        } catch (Exception $e) {
            throw new Exception('Error while connecting database');
        }
    }

    private function executeQueryConn($conn, null|array $params)
    {
        if (!$params) {
            return $conn->execute();
        }

        return $conn->execute($params);
    }

    public function select(string $query, ?array $params = null): array
    {
        try {
            $query = trim($query);
            $this->connectDatabase();

            $conn = $this->conn->prepare($query);
            $this->executeQueryConn($conn, $params);

            $fetched = $conn->fetchAll(PDO::FETCH_ASSOC);
            $this->conn = null;

            return $fetched;

        } catch (Exception $e) {
            throw new Exception('Query error');
        }
    }

    public function insert(array $data, string $table): bool
    {
        try {
            $this->connectDatabase();

            $values = array_values($data);

            $query = "INSERT INTO {$table} (title, description, image_url, reading_time, post, user_id) VALUES ('$values[0]', '$values[1]', '$values[2]', '$values[3]', '$values[4]', '1')";

            $conn = $this->conn->prepare($query);

            $returned = $this->executeQueryConn($conn, null);

            $this->conn = null;

            return $returned;

        } catch (Exception $e) {
            throw new Exception('Query error: missing fields');
        }
    }

    public function lastInsertId(string $table): string
    {
        $query = "SELECT id FROM {$table} ORDER BY id DESC LIMIT 1";

        $this->connectDatabase();

        $conn = $this->conn->prepare($query);

        $this->executeQueryConn($conn, null);

        $fetched = $conn->fetchAll(PDO::FETCH_COLUMN);
        $this->conn = null;

        return $fetched[0];
    }
}