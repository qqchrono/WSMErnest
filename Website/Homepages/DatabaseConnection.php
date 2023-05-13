<?php

class DatabaseConnection
{
    public function __construct()
    {
        $conn = new mysqli('localhost', 'root', '', 'watersupplymanagement');

        if(!$conn)
        {
            die ("<h1>Database Connection Failed</h1>");
        }
        
        return $this->conn = $conn;
    }

    public function __destruct()
    {
        
    }
}
?>