<?php

class Pembayaran_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambah($data)
    {
        $query = "INSERT INTO pembayaran VALUES('', :iduser, :stambuk, :waktupembayaran, :nominal, :status)";

        $this->db->query($query);
        $this->db->bind('iduser', $data['iduser']);
        $this->db->bind('stambuk', $data['stambuk']);
        $this->db->bind('waktupembayaran', $data['waktupembayaran']);
        $this->db->bind('nominal', $data['nominal']);
        $this->db->bind('status', $data['status']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tampil()
    {
        // $this->db->query("SELECT * FROM pembayaran ORDER BY idpembayaran ASC");
        $this->db->query("SELECT pembayaran.idpembayaran, pembayaran.iduser, pembayaran.stambuk, pembayaran.waktupembayaran, pembayaran.nominal, pembayaran.status, mahasiswa.nama FROM pembayaran JOIN mahasiswa ON pembayaran.stambuk = mahasiswa.stambuk;");
        return $this->db->resultSet();
    }

    public function hapus($id)
    {
        $query = "DELETE FROM pembayaran WHERE idpembayaran = :idpembayaran";
        $this->db->query($query);
        $this->db->bind('idpembayaran', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusByStambuk($id)
    {
        $query = "DELETE FROM pembayaran WHERE stambuk = :stambuk";
        $this->db->query($query);
        $this->db->bind('stambuk', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tampilById($id)
    {
        $this->db->query("SELECT * FROM pembayaran WHERE idpembayaran= :idpembayaran");
        $this->db->bind('idpembayaran', $id);
        return $this->db->single();
    }

    public function tampilByStambuk($stambuk)
    {
        $this->db->query("SELECT * FROM pembayaran WHERE stambuk= :stambuk ORDER BY idpembayaran DESC");
        $this->db->bind('stambuk', $stambuk);
        return $this->db->single();
    }

    public function tampilByStambuk_pmb($stambuk)
    {
        $this->db->query("SELECT * FROM pembayaran WHERE stambuk= :stambuk");
        $this->db->bind('stambuk', $stambuk);
        return $this->db->resultSet();
    }

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

    public function countPembayaran()
    {
        $this->db->query("SELECT COUNT(idpembayaran) AS jumlahPembayaran FROM pembayaran");
        return $this->db->single();
    }

    public function printLaporan($stambuk)
    {
        $this->db->query("SELECT pembayaran.stambuk, pembayaran.waktupembayaran, pembayaran.nominal, pembayaran.status, mahasiswa.nama FROM pembayaran JOIN mahasiswa ON pembayaran.stambuk = mahasiswa.stambuk WHERE pembayaran.stambuk = :stambuk ORDER BY pembayaran.idpembayaran DESC");

        $this->db->bind('stambuk', $stambuk);

        return $this->db->single();
    }
}
