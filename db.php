<?php

class Database {

    private $host;
    private $dbname;
    private $username;
    private $password;
    public $conn;

    public function __construct() {
        $this->host = "localhost";
        $this->dbname = "book";
        $this->username = "root";
        $this->password = "";
    }

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new \PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );
        } catch(\PDOException $exp) {
            echo "Connection Error: " . $exp->getMessage();
        }

        return $this->conn;
    }
}
?>