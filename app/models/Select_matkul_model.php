<?php

class Select_matkul_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambah($data)
    {
        if (isset($data['kodematakuliah']) && is_array($data['kodematakuliah'])) {
            foreach ($data['kodematakuliah'] as $km) {
                $query = "INSERT INTO matkul_select VALUES('', :stambuk, :kodematakuliah, :idpembayaran)";
                $this->db->query($query);
                $this->db->bind('stambuk', $data['stambuk']);
                $this->db->bind('kodematakuliah', $km);
                $this->db->bind('idpembayaran', $data['idpembayaran']);

                $this->db->execute();
            }
        }

        return $this->db->rowCount();
    }

    public function hapus($id)
    {
        $query = "DELETE FROM matkul_select WHERE idpembayaran = :idpembayaran";
        $this->db->query($query);
        $this->db->bind('idpembayaran', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // public function tampilById($id)
    // {
    //     $this->db->query("SELECT matkul_select.id, matkul_select.stambuk, matkul_select.kodematakuliah, matakuliah.namamatakuliah, matakuliah.sks FROM matkul_select LEFT JOIN matakuliah ON matkul_select.kodematakuliah = matakuliah.kodematakuliah WHERE matkul_select.stambuk = :stambuk;");
    //     $this->db->bind('stambuk', $id);
    //     return $this->db->resultSet();
    // }
    public function tampilById($id)
    {
        $this->db->query("SELECT * FROM matkul_select WHERE stambuk = :stambuk");
        $this->db->bind('stambuk', $id);
        return $this->db->resultSet();  // Mengembalikan semua mata kuliah yang dipilih oleh mahasiswa
    }

    public function printMatkul($id)
    {
        $this->db->query("SELECT matkul_select.kodematakuliah FROM matkul_select LEFT JOIN matakuliah ON matkul_select.kodematakuliah = matakuliah.kodematakuliah WHERE matkul_select.stambuk = :stambuk;");
        $this->db->bind('stambuk', $id);
        return $this->db->resultSet();
    }

    public function tampil()
    {
        $this->db->query("SELECT matkul_select.id, matkul_select.stambuk, matakuliah.namamatakuliah, matakuliah.sks FROM matkul_select JOIN matakuliah ON matkul_select.kodematakuliah = matakuliah.kodematakuliah;");
        return $this->db->resultSet();
    }

    public function edit($data)
    {
        $query = "UPDATE matkul_select SET idpembayaran = :idpembayaran WHERE stambuk = :stambuk AND kodematakuliah = :kodematakuliah";
        $this->db->query($query);
        $this->db->bind('idpembayaran', $data['idpembayaran']);
        $this->db->bind('stambuk', $data['stambuk']);
        $this->db->bind('kodematakuliah', $data['kodematakuliah']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
