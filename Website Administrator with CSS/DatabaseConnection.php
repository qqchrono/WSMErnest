<?php
#159.223.83.53
class DatabaseConnection
{
    public function __construct()
    {
        $conn = new mysqli('localhost', 'root', 'root', 'db');

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