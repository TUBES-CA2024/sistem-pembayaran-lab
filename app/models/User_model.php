<?php

class User_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    //Digunakan untuk menambahkan data user di User
    public function tambah($data)
    {

        $query = "INSERT INTO user VALUES('', :username, :password, :stambuk, :role)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('stambuk', $data['role'] === 'Mahasiswa' ? $data['stambuk'] : null);
        $this->db->bind('role', $data['role']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    //Digunakan untuk menghapus data user di User
    public function hapus($id)
    {
        $query = "DELETE FROM user WHERE iduser = :iduser";
        $this->db->query($query);
        $this->db->bind('iduser', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    //Digunakan untuk menampilkan data user di User
    public function tampil()
    {
        $this->db->query("SELECT * FROM user ORDER BY iduser ASC;");
        return $this->db->resultSet();
    }
    //Digunakan untuk menampilkan data user berdasarkan id di User
    public function tampilById($id)
    {
        $this->db->query("SELECT * FROM user WHERE iduser= :iduser");
        $this->db->bind('iduser', $id);
        return $this->db->single();
    }
    //Digunakan untuk mengedit data user di User
    public function edit($data)
    {
        $query = "UPDATE user SET username= :username, password= :password, stambuk= :stambuk, role= :role WHERE iduser= :iduser";
        $this->db->query($query);
        $this->db->bind('iduser', $data['iduser']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        // Jika role adalah Mahasiswa, gunakan nilai stambuk, jika bukan, gunakan NULL
        $this->db->bind('stambuk', $data['role'] === 'Mahasiswa' ? $data['stambuk'] : null);
        $this->db->bind('role', $data['role']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    //Digunakan Di Beranda
    public function countUser()
    {
        $this->db->query("SELECT COUNT(iduser) AS jumlahUser FROM user;");
        return $this->db->single();
    }
}
