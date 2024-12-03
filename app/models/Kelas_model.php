<?php

class Kelas_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

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

    public function hapus($id)
    {
        $query = "DELETE FROM matakuliah WHERE kodematakuliah = :kodematakuliah";
        $this->db->query($query);
        $this->db->bind('kodematakuliah', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapuskls($id)
    {
        $query = "DELETE FROM kelas WHERE idkelas = :idkelas";
        $this->db->query($query);
        $this->db->bind('idkelas', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tampilById($id)
    {
        $this->db->query("SELECT matkul_select.id, matkul_select.stambuk, matakuliah.namamatakuliah, matakuliah.sks FROM matkul_select LEFT JOIN matakuliah ON matkul_select.kodematakuliah = matakuliah.kodematakuliah WHERE matkul_select.stambuk = :stambuk;");
        $this->db->bind('stambuk', $id);
        return $this->db->resultSet();
    }

    public function tampil()
    {
        $this->db->query("SELECT * FROM kelas ORDER BY idkelas ASC;");
        return $this->db->resultSet();
    }

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
    public function tambahkls($data)
    {
        $query = "INSERT INTO kelas VALUES(:idkelas, :namekelas)";

        $this->db->query($query);
        $this->db->bind('idkelas', $data['idkelas']);
        $this->db->bind('namekelas', $data['namekelas']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function countKelas()
    {
        $this->db->query("SELECT COUNT(idkelas) AS jumlahKelas FROM kelas");
        return $this->db->single();
    }
}
