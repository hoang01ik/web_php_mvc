<?php
class Database {
    protected $conn;
    public function __construct() {
        $this->conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        error_log("Kết nối thành công!");
        $this->conn->set_charset("utf8");
    }
    public function __destruct() {
        $this->conn->close();
    }
    public function query($sql)
    {
        return $this->conn->query($sql);
    }
    public function fetchAll($sql)
    {
        $result = $this->query($sql);
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return false;
    }
    public function fetchOne($sql)
    {
        $result = $this->query($sql);
        return $result->fetch_assoc();
    }
}