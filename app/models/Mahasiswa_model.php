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
        if (empty($data['stambuk']) || empty($data['nama']) || empty($data['prodi']) || empty($data['idkelas'])) {
            return 0; // Gagal menambah data karena input tidak lengkap
        }

        $query = "INSERT INTO mahasiswa VALUES(:stambuk, :nama, :prodi, :idkelas, :namaagama, :email, :telepon, :jeniskelamin, :alamat, :foto, 0)";

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
        $this->db->query("SELECT mahasiswa.stambuk, mahasiswa.nama, mahasiswa.prodi, kelas.namekelas, mahasiswa.namaagama, mahasiswa.email, mahasiswa.telepon, mahasiswa.jeniskelamin, mahasiswa.alamat, mahasiswa.foto, mahasiswa.isCompleted FROM mahasiswa JOIN kelas ON mahasiswa.idkelas = kelas.idkelas");

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
        $this->db->query("SELECT mahasiswa.stambuk, mahasiswa.nama, mahasiswa.prodi, kelas.idkelas, kelas.namekelas, mahasiswa.namaagama, mahasiswa.email, mahasiswa.telepon, mahasiswa.jeniskelamin, mahasiswa.alamat, mahasiswa.foto, mahasiswa.isCompleted FROM mahasiswa JOIN kelas ON mahasiswa.idkelas = kelas.idkelas WHERE mahasiswa.stambuk = :stambuk;");

        $this->db->bind('stambuk', $id);
        return $this->db->single();
    }
    public function tampilByNim($nim)
    {
        $this->db->query("SELECT * FROM mahasiswa WHERE stambuk = :stambuk");
        $this->db->bind('stambuk', $nim);
        $result = $this->db->single();

        // Jika data tidak ditemukan, kembalikan array default
        if (!$result) {
            return [
                'stambuk' => '',
                'nama' => '',
                'prodi' => '',
                'idkelas' => '',
                'namaagama' => '',
                'email' => '',
                'telepon' => '',
                'jeniskelamin' => '',
                'alamat' => '',
                'foto' => '',
                'isCompleted' => 0
            ];
        }
        return $result;
    }

    public function edit($data)
    {
        $query = "UPDATE mahasiswa SET stambuk = :stambuk, nama = :nama, prodi = :prodi, idkelas = :idkelas, namaagama = :namaagama, email = :email, telepon = :telepon, jeniskelamin = :jeniskelamin, alamat = :alamat, foto = :foto, isCompleted = :isCompleted  WHERE stambuk = :old_stambuk";

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
        $this->db->bind('isCompleted', $data['isCompleted']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function countMahasiswa()
    {
        $this->db->query("SELECT COUNT(stambuk) AS jumlahMahasiswa FROM mahasiswa");
        return $this->db->single();
    }

    public function cekNimExists($nim)
    {
        $this->db->query("SELECT stambuk FROM mahasiswa WHERE stambuk = :stambuk");
        $this->db->bind('stambuk', $nim);
        $this->db->execute();

        return $this->db->rowCount() > 0; // Return true jika NIM sudah ada
    }

    // if (!empty($_FILES['foto']['name'])) {
    //     $targetDir = "uploads/";
    //     $fileName = basename($_FILES['foto']['name']);
    //     $targetFilePath = $targetDir . $fileName;

    //     // Validasi format file
    //     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    //     $allowedTypes = ['jpg', 'jpeg', 'png'];
    //     if (!in_array(strtolower($fileType), $allowedTypes)) {
    //         Flasher::setFlash('Format file tidak didukung', '', 'danger');
    //         header('Location: ' . BASEURL . '/Datamahasiswa');
    //         exit();
    //     }

    //     // Pindahkan file
    //     if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFilePath)) {
    //         $_POST['foto'] = $fileName; // Kirim nama file ke model
    //     } else {
    //         Flasher::setFlash('Gagal mengunggah foto', '', 'danger');
    //         header('Location: ' . BASEURL . '/Datamahasiswa');
    //         exit();
    //     }
    // }

}
