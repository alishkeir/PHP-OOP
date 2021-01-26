<?php

namespace App\Connection;

use PDO;
use PDOException;

class Connection
{
    private $server = 'mysql:host=localhost;dbname=php_session';
    private $user = 'root';
    private $password = '';

    protected $conn;

    public function openConnection()
    {
        try
        {
            $this->conn = new PDO($this->server, $this->user,$this->password);
            return $this->conn;
        }
        catch (PDOException $e)
        {
            echo 'There is some problem in connection: ' . $e->getMessage();
        }

    }

    public function closeConnection()
    {
        $this->conn = null;
    }
}