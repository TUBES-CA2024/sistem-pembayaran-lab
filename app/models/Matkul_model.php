<?php

class Matkul_model
{
    private $db;
    //Digunakan untuk mengecek data matakuliah di Matakuliah
    public function __construct()
    {
        $this->db = new Database;
    }
    //Digunakan untuk menambahkan data matakuliah di Matakuliah
    public function tambah($data)
    {
        $query = "INSERT INTO matakuliah VALUES(:kodematakuliah, :namamatakuliah, :sks)";

        $this->db->query($query);
        $this->db->bind('kodematakuliah', $data['kodematakuliah']);
        $this->db->bind('namamatakuliah', $data['namamatakuliah']);
        $this->db->bind('sks', $data['sks']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    //Digunakan untuk menampilkan data matakuliah di Matakuliah
    public function tampil()
    {
        $this->db->query("SELECT * FROM matakuliah ORDER BY kodematakuliah ASC;");
        return $this->db->resultSet();
    }
    //Digunakan untuk menghapus data matakuliah di Matakuliah
    public function hapus($id)
    {
        $query = "DELETE FROM matakuliah WHERE kodematakuliah = :kodematakuliah";
        $this->db->query($query);
        $this->db->bind('kodematakuliah', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    //Digunakan untuk menampilkan data matakuliah berdasarkan id di Matakuliah edit
    public function tampilById($id)
    {
        $this->db->query("SELECT * FROM matakuliah WHERE kodematakuliah= :kodematakuliah");
        $this->db->bind('kodematakuliah', $id);
        return $this->db->single();
    }
    //Digunakan untuk mengedit data matakuliah di Matakuliah
    public function edit($data)
    {
        $query = "UPDATE matakuliah SET kodematakuliah= :kodematakuliah, namamatakuliah= :namamatakuliah, sks= :sks WHERE kodematakuliah= :old_kodematakuliah";
        $this->db->query($query);
        $this->db->bind('kodematakuliah', $data['kodematakuliah']);
        $this->db->bind('namamatakuliah', $data['namamatakuliah']);
        $this->db->bind('sks', $data['sks']);
        $this->db->bind('old_kodematakuliah', $data['old_kodematakuliah']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    //Digunakan untuk menghitung jumlah data matakuliah di Matakuliah
    public function countMatkul()
    {
        $this->db->query("SELECT COUNT(kodematakuliah) AS jumlahMatkul FROM matakuliah");
        return $this->db->single();
    }
}
