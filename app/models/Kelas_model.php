<?php

class Kelas_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    //Digunakan untuk menambahkan data kelas di Kelas
    public function tambahkls($data)
    {
        $query = "INSERT INTO kelas VALUES(:idkelas, :namekelas)";

        $this->db->query($query);
        $this->db->bind('idkelas', $data['idkelas']);
        $this->db->bind('namekelas', $data['namekelas']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    //Digunakan untuk menghapus data kelas di Kelas
    public function hapuskls($id)
    {
        $query = "DELETE FROM kelas WHERE idkelas = :idkelas";
        $this->db->query($query);
        $this->db->bind('idkelas', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    //Digunakan untuk menampilkan data kelas di Kelas
    public function tampil()
    {
        $this->db->query("SELECT * FROM kelas ORDER BY idkelas ASC;");
        return $this->db->resultSet();
    }
    //Digunakan untuk menampilkan data kelas berdasarkan id di Kelas
    public function countKelas()
    {
        $this->db->query("SELECT COUNT(idkelas) AS jumlahKelas FROM kelas");
        return $this->db->single();
    }
}
