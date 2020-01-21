<?php

class db
{
    private $host = "sql2.freemysqlhosting.net";
    private $db_name = "sql2319497";
    private $username = "sql2.freemysqlhosting.net";
    private $password = "wD6*fX8*";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Database Connection Error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}