<?php
    public $conn;
    public function getConnection()
    {
        $this.conn = null;
        try{
            $this->conn = new PDO("mysql:host=localhost:8081;dbname=ecommerce", "root", "progetto");
            $this->conn->exec("set names utf8");
        }catch(PDOException $e)
        {
            echo "Database offline: " . $e->getMessage();
        }
        return $this->conn;
    }
?>