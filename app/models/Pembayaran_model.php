<?php

class Pembayaran_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    //USE
    public function tambah($data)
    {
        $query = "INSERT INTO pembayaran VALUES('', :idtagihan, :tanggal_pembayaran, :jumlah_pembayaran, :status)";
        $this->db->query($query);
        $this->db->bind('idtagihan', $data['idtagihan']);
        $this->db->bind('tanggal_pembayaran', $data['tanggal_pembayaran']);
        $this->db->bind('jumlah_pembayaran', $data['jumlah_pembayaran']);
        $this->db->bind('status', $data['status']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    //USE
    public function tampil()
    {
        $query = "SELECT * FROM pembayaran";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    //Digunakan untuk menghapus data pembayaran di Pembayaran
    public function hapus($id)
    {
        $query = "DELETE FROM pembayaran WHERE idpembayaran = :idpembayaran";
        $this->db->query($query);
        $this->db->bind('idpembayaran', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    //Digunakan untuk menghapus data pembayaran berdasarkan stambuk di Datamahasiswa
    public function hapusByStambuk($id)
    {
        $query = "DELETE FROM pembayaran WHERE stambuk = :stambuk";
        $this->db->query($query);
        $this->db->bind('stambuk', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    //Digunakan untuk menampilkan data pembayaran berdasarkan idpembayaran di Pembayaran
    public function tampilById($id)
    {
        $this->db->query("SELECT * FROM pembayaran WHERE idpembayaran= :idpembayaran");
        $this->db->bind('idpembayaran', $id);
        return $this->db->single();
    }

    //Digunakan untuk mengedit data pembayaran di Pemabayaran
    public function edit($data)
    {
        $query = "UPDATE pembayaran SET stambuk= :stambuk, waktupembayaran= :waktupembayaran, nominal= :nominal, status= :status WHERE idpembayaran= :idpembayaran";
        $this->db->query($query);
        $this->db->bind('stambuk', $data['stambuk']);
        $this->db->bind('waktupembayaran', $data['waktupembayaran']);
        $this->db->bind('nominal', $data['nominal']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('idpembayaran', $data['idpembayaran']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    //Digunakan Di Beranda
    public function countPembayaran()
    {
        $this->db->query("SELECT COUNT(idpembayaran) AS jumlahPembayaran FROM pembayaran");
        return $this->db->single();
    }

    //Digunakan Di Beranda
    public function printLaporan($stambuk)
    {
        $this->db->query("SELECT pembayaran.stambuk, pembayaran.waktupembayaran, pembayaran.nominal, pembayaran.status, mahasiswa.nama FROM pembayaran JOIN mahasiswa ON pembayaran.stambuk = mahasiswa.stambuk WHERE pembayaran.stambuk = :stambuk ORDER BY pembayaran.idpembayaran DESC");

        $this->db->bind('stambuk', $stambuk);

        return $this->db->single();
    }

    //Digunakan Di Pembayaranmh
    public function tampilHistory($stambuk)
    {
        $this->db->query("SELECT pembayaran.waktupembayaran AS tanggal, pembayaran.nominal AS tagihan, pembayaran.status AS status FROM pembayaran WHERE stambuk = :stambuk AND status = 'Lunas' ORDER BY pembayaran.idpembayaran DESC");
        $this->db->bind('stambuk', $stambuk);
        return $this->db->resultSet();
    }

    //Digunakan Di Pembayaranmh
    public function getPembayaranByStambuk($stambuk)
    {
        $this->db->query("
        SELECT 
            pembayaran.idpembayaran, 
            pembayaran.stambuk, 
            pembayaran.waktupembayaran, 
            pembayaran.nominal, 
            pembayaran.status, 
            GROUP_CONCAT(matakuliah.namamatakuliah SEPARATOR ', ') AS matkul
        FROM pembayaran
        LEFT JOIN matkul_select ON pembayaran.stambuk = matkul_select.stambuk
        LEFT JOIN matakuliah ON matkul_select.kodematakuliah = matakuliah.kodematakuliah
        WHERE pembayaran.stambuk = :stambuk AND pembayaran.status = 'Lunas'
        GROUP BY pembayaran.idpembayaran
        ORDER BY pembayaran.waktupembayaran DESC
    ");
        $this->db->bind('stambuk', $stambuk);
        return $this->db->resultSet();
    }
}
