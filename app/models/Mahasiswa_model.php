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
        $query = "INSERT INTO mahasiswa VALUES(:stambuk, :nama, :prodi, :idkelas, :namaagama, :email, :telepon, :jeniskelamin, :alamat, :foto)";

        $this->db->query($query);
        $this->db->bind('stambuk', $data['stambuk']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('idkelas', $data['idkelas']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('namaagama', $data['namaagama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('telepon', $data['telepon']);
        $this->db->bind('jeniskelamin', $data['jeniskelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('foto', $data['foto']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tampil()
    {
        $this->db->query("SELECT mahasiswa.stambuk, mahasiswa.nama, mahasiswa.prodi, kelas.namekelas, mahasiswa.namaagama, mahasiswa.email, mahasiswa.telepon, mahasiswa.jeniskelamin, mahasiswa.alamat, mahasiswa.foto FROM mahasiswa JOIN kelas ON mahasiswa.idkelas = kelas.idkelas");

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
        $this->db->query("SELECT mahasiswa.stambuk, mahasiswa.nama, mahasiswa.prodi, kelas.idkelas, kelas.namekelas, mahasiswa.namaagama, mahasiswa.email, mahasiswa.telepon, mahasiswa.jeniskelamin, mahasiswa.alamat, mahasiswa.foto FROM mahasiswa JOIN kelas ON mahasiswa.idkelas = kelas.idkelas WHERE mahasiswa.stambuk = :stambuk;");

        $this->db->bind('stambuk', $id);
        return $this->db->single();
    }

    public function edit($data)
    {
        $query = "UPDATE mahasiswa SET stambuk = :stambuk, nama = :nama, prodi = :prodi, idkelas = :idkelas, namaagama = :namaagama, email = :email, telepon = :telepon, jeniskelamin = :jeniskelamin, alamat = :alamat, foto = :foto WHERE stambuk = :old_stambuk";

        $this->db->query($query);
        $this->db->bind('stambuk', $data['stambuk']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('idkelas', $data['idkelas']);
        $this->db->bind('namaagama', $data['namaagama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('telepon', $data['telepon']);
        $this->db->bind('jeniskelamin', $data['jeniskelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('old_stambuk', $data['old_stambuk']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function countMahasiswa()
    {
        $this->db->query("SELECT COUNT(stambuk) AS jumlahMahasiswa FROM mahasiswa");
        return $this->db->single();
    }
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
