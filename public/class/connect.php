<?php
class DatabaseConnection {
    private $host;
    private $name;
    private $password;
    private $database;
    private $connection;

    public function __construct($host, $name, $password, $database) {
        $this->host = $host;
        $this->name = $name;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
    }

    private function connect() {
        $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $name, $password);
        if ($this->connection->connect_error) {
            die("Database connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
