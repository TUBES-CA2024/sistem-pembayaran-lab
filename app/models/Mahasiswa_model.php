<?php

class Mahasiswa_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambah($data)
    {
        $query = "INSERT INTO mahasiswa VALUES(:stambuk, :nama, :prodi, :idkelas)";

        $this->db->query($query);
        $this->db->bind('stambuk', $data['stambuk']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('idkelas', $data['idkelas']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tampil()
    {
        $this->db->query("SELECT stambuk, nama, prodi, kelas.namekelas FROM mahasiswa JOIN kelas ON mahasiswa.idkelas = kelas.idkelas;");
        return $this->db->resultSet();
    }

    public function hapus($id)
    {
        $query = "DELETE FROM mahasiswa WHERE stambuk = :stambuk";
        $this->db->query($query);
        $this->db->bind('stambuk', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tampilById($id)
    {
        $this->db->query("SELECT stambuk, nama, prodi, kelas.idkelas, kelas.namekelas FROM mahasiswa JOIN kelas ON mahasiswa.idkelas = kelas.idkelas WHERE stambuk = :stambuk;");
        $this->db->bind('stambuk', $id);
        return $this->db->single();
    }

    public function edit($data)
    {
        $query = "UPDATE mahasiswa SET stambuk= :stambuk, nama= :nama, prodi= :prodi, idkelas= :idkelas WHERE stambuk= :old_stambuk";
        $this->db->query($query);
        $this->db->bind('stambuk', $data['stambuk']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('idkelas', $data['idkelas']);
        $this->db->bind('old_stambuk', $data['old_stambuk']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // public function daftarMhsAda($data)
    // {
    //     $query = "UPDATE mahasiswa SET stambuk= :stambuk, nama= :nama, prodi= :prodi, idkelas= :idkelas WHERE stambuk= :stambuk";
    //     $this->db->query($query);
    //     $this->db->bind('stambuk', $data['stambuk']);
    //     $this->db->bind('nama', $data['nama']);
    //     $this->db->bind('prodi', $data['prodi']);
    //     $this->db->bind('idkelas', $data['idkelas']);
    //     // $this->db->bind('old_stambuk', $data['old_stambuk']);

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }

    public function countMahasiswa()
    {
        $this->db->query("SELECT COUNT(stambuk) AS jumlahMahasiswa FROM mahasiswa");
        return $this->db->single();
    }
}
