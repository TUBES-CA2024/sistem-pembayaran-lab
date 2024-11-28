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
        $this->db->bind('iduser', $_SESSION['iduser']);
        $this->db->bind('stambuk', $data['stambuk']);
        $this->db->bind('waktupembayaran', $data['waktupembayaran']);
        $this->db->bind('nominal', $data['nominal']);
        $this->db->bind('status', $data['status']);

        $this->db->execute();
        return $this->db->lastInsertId();
        // return $this->db->rowCount();
    }

    public function tampil()
    {
        $this->db->query("SELECT * FROM pembayaran ORDER BY idpembayaran ASC");
        $this->db->query("SELECT pembayaran.idpembayaran, pembayaran.iduser, pembayaran.stambuk, pembayaran.waktupembayaran, pembayaran.nominal, pembayaran.status, mahasiswa.nama FROM pembayaran JOIN mahasiswa ON pembayaran.stambuk = mahasiswa.stambuk ORDER BY pembayaran.idpembayaran DESC");

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
    public function gettampilByPembayaran($id)
    {
        $this->db->query("SELECT kodematakuliah FROM pembayaran_matkul WHERE idpembayaran = :idpembayaran");
        $this->db->bind('idpembayaran', $id);
        return $this->db->resultSet();
    }

    public function tampilByStambuk($stambuk)
    {
        $this->db->query("SELECT * FROM pembayaran WHERE stambuk= :stambuk ORDER BY idpembayaran DESC");
        $this->db->bind('stambuk', $stambuk);
        return $this->db->single();
    }


    public function tampilByStambuk_pmb($stambuk)
    {
        $this->db->query("SELECT pembayaran.idpembayaran, pembayaran.stambuk, pembayaran.waktupembayaran, pembayaran.nominal, pembayaran.status, mahasiswa.nama FROM pembayaran JOIN mahasiswa ON pembayaran.stambuk = mahasiswa.stambuk WHERE pembayaran.stambuk = :stambuk ORDER BY pembayaran.idpembayaran DESC");

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
    public function tampilHistory($stambuk)
    {
        $this->db->query("SELECT pembayaran.waktupembayaran AS tanggal, pembayaran.nominal AS tagihan, pembayaran.status AS status FROM pembayaran WHERE stambuk = :stambuk AND status = 'Lunas' ORDER BY pembayaran.idpembayaran DESC");
        $this->db->bind('stambuk', $stambuk);
        return $this->db->resultSet();
    }
    public function getMatkulByStambuk($stambuk)
    {
        $this->db->query("
        SELECT ms.stambuk, GROUP_CONCAT(m.namamatakuliah SEPARATOR ', ') AS matkul
        FROM matkul_select ms
        JOIN matakuliah m ON ms.kodematakuliah = m.kodematakuliah
        WHERE ms.stambuk = :stambuk
        GROUP BY ms.stambuk
    ");
        $this->db->bind('stambuk', $stambuk);
        return $this->db->single();
    }
}
