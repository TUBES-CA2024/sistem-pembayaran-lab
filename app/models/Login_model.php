<?php

class Login_model
{
    private $db;
    //Digunakan untuk mengecek data user di User
    public function __construct()
    {
        $this->db = new Database;
    }
    //Digunakan untuk mengecek data user di User
    public function getUser()
    {
        $this->db->query("SELECT * FROM user");

        return $this->db->resultSet();
    }
    //Digunakan untuk mengecek data user berdasarkan username di User
    public function getUserByUsername($username)
    {
        $this->db->query("SELECT * FROM user WHERE username = :username");
        $this->db->bind('username', $username);
        return $this->db->single();
    }
}
