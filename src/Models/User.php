<?php

namespace App\Models;

use App\Connection\Connection;
use PDOStatement;

class User
{
    private $db;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $conn = new Connection();
        $this->db = $conn->openConnection();
    }

    /**
     * Get All Users
     * @return false|PDOStatement
     */
    public function index()
    {
        $show  = "SELECT name, username FROM users ORDER BY id";
        return $this->db->query($show);
    }

    /**
     * Store user record in database
     * @param $email
     * @param $username
     * @param $password
     * @param $name
     */
    public function store($email, $username, $password, $name)
    {

        $password = password_hash($password, PASSWORD_BCRYPT);

        try {
            $query = 'INSERT INTO users (name, username, password, email)'
                . ' VALUES (?, ?, ?, ?)';

            $stmt = $this->db->prepare($query);
            $stmt->execute([$name, $username, $password, $email]);

        } catch (\PDOException $exception){
            echo 'Internal Error';
            exit();
        }
    }
}