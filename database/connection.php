<?php
class Connection {
    public $host = "localhost:3307";
    public $user = "nb";
    public $password = "";
    public $database = "job";
    public $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function __destruct() {
        $this->conn->close();
    }
}


?>