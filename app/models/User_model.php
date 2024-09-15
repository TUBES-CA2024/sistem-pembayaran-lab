<?php

class User_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambah($data)
    {
        $query = "INSERT INTO user VALUES('', :username, :password, :role)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('role', $data['role']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapus($id)
    {
        $query = "DELETE FROM user WHERE iduser = :iduser";
        $this->db->query($query);
        $this->db->bind('iduser', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tampil()
    {
        $this->db->query("SELECT * FROM user ORDER BY iduser ASC;");
        return $this->db->resultSet();
    }

    public function tampilById($id)
    {
        $this->db->query("SELECT * FROM user WHERE iduser= :iduser");
        $this->db->bind('iduser', $id);
        return $this->db->single();
    }

    public function edit($data)
    {
        $query = "UPDATE user SET username= :username, password= :password, role= :role WHERE iduser= :iduser";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('iduser', $data['iduser']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function countUser(){
        $this->db->query("SELECT COUNT(iduser) AS jumlahUser FROM user;");
        return $this->db->single();
    }
}
