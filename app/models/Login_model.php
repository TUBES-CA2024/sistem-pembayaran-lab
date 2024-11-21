<?php

class Login_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser()
    {
        $this->db->query("SELECT * FROM user");

        return $this->db->resultSet();
    }

    public function getUserByUsername($username)
    {
        $this->db->query("SELECT * FROM user WHERE username = :username");
        $this->db->bind('username', $username);
        return $this->db->single();
    }
}
