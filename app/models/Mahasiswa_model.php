<?php

class Mahasiswa_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    //Digunakan pada Datamahasiswa & Datamahasiswamh.php
    public function tambah($data, $file)
    {
        if (empty($data['stambuk']) || empty($data['nama']) || empty($data['idkelas'])) {
            return 0;
        }
        $filePath = null; // Path file foto yang akan disimpan

        if (isset($file['foto']) && $file['foto']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $file['foto']['tmp_name'];
            $fileName = basename($file['foto']['name']);
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png'];

            if (!in_array($fileExtension, $allowedExtensions)) {
                return 0;
            }

            // Validasi ukuran file (contoh: maksimum 2MB)
            $maxFileSize = 2 * 1024 * 1024; // 2MB
            if ($file['foto']['size'] > $maxFileSize) {
                return 0;
            }

            // Generate nama file unik dan path upload
            $fileName = uniqid('') . '.' . $fileExtension;
            $uploadDir = __DIR__ . '/../../assets/img/profil/'; // Path absolut
            $filePath = $uploadDir . $fileName;

            if (!move_uploaded_file($fileTmpPath, $filePath)) {
                return 0;
            }
        }

        // Query untuk menyimpan data mahasiswa
        $query = "INSERT INTO mahasiswa VALUES (:stambuk, :nama, :prodi, :idkelas, :namaagama, :email, :telepon, :jeniskelamin, :alamat, :foto, 1)";

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
        $this->db->bind('foto', str_replace(__DIR__ . '/../../', '', $filePath));
        $this->db->execute();

        return $this->db->rowCount();
    }

    //Digunakan pada Datamahasiswa.php
    public function tampil()
    {
        $this->db->query("SELECT mahasiswa.stambuk, mahasiswa.nama, mahasiswa.prodi, kelas.namekelas, mahasiswa.namaagama, mahasiswa.email, mahasiswa.telepon, mahasiswa.jeniskelamin, mahasiswa.alamat, mahasiswa.foto, mahasiswa.isCompleted FROM mahasiswa JOIN kelas ON mahasiswa.idkelas = kelas.idkelas");
        return $this->db->resultSet();
    }
    //Digunakan pada Datamahasiswa.php
    public function hapus($id)
    {
        // Ambil data mahasiswa untuk mendapatkan nama file foto dari database
        $queryGetFoto = "SELECT foto FROM mahasiswa WHERE stambuk = :stambuk";
        $this->db->query($queryGetFoto);
        $this->db->bind('stambuk', $id);
        $data = $this->db->single();

        // Pastikan data ditemukan
        if (!$data) {
            return ['status' => false, 'message' => 'Data tidak ditemukan'];
        }

        // Hapus file foto jika ada
        if (!empty($data['foto'])) {
            $filePath = __DIR__ . '/../../' . $data['foto']; // Path absolut file

            // Cek apakah file ada
            if (file_exists($filePath)) {
                if (!unlink($filePath)) {
                    return ['status' => false, 'message' => 'Gagal menghapus file foto'];
                }
            } else {
                return ['status' => false, 'message' => 'File foto tidak ditemukan'];
            }
        }

        // Hapus data dari database
        $query = "DELETE FROM mahasiswa WHERE stambuk = :stambuk";
        $this->db->query($query);
        $this->db->bind('stambuk', $id);
        $this->db->execute();

        // Return jumlah baris yang terpengaruh
        return $this->db->rowCount();
    }
    //Digunakan pada Datamahasiswa.php
    public function tampilById($stambuk)
    {
        $this->db->query("SELECT 
            mahasiswa.stambuk, 
            mahasiswa.nama, 
            mahasiswa.prodi, 
            kelas.idkelas, 
            kelas.namekelas,
            mahasiswa.namaagama, 
            mahasiswa.email, 
            mahasiswa.telepon, 
            mahasiswa.jeniskelamin, 
            mahasiswa.alamat, 
            mahasiswa.foto, 
            mahasiswa.isCompleted 
        FROM 
            mahasiswa 
        JOIN 
            kelas ON mahasiswa.idkelas = kelas.idkelas  
        WHERE 
            mahasiswa.stambuk = :stambuk");  // Menambahkan kondisi WHERE berdasarkan stambuk

        // Bind parameter stambuk ke query
        $this->db->bind(':stambuk', $stambuk);

        // Mengembalikan hasil query yang sesuai dengan stambuk tertentu
        return $this->db->single();
    }


    // Digunakan pada Pembyaranmh.php
    public function tampilByNim($stambuk)
    {
        $this->db->query("SELECT * FROM mahasiswa WHERE stambuk = :stambuk");
        $this->db->bind('stambuk', $stambuk);
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
    //Digunakan pada Datamahasiswamh.php
    public function edit($data, $file)
    {
        // Validasi input
        if (empty($data['stambuk']) || empty($data['nama']) || empty($data['idkelas'])) {
            return 0; // Data tidak lengkap
        }

        // Ambil data lama dari database untuk mendapatkan nama file foto lama
        $queryGetFotoLama = "SELECT foto FROM mahasiswa WHERE stambuk = :stambuk";
        $this->db->query($queryGetFotoLama);
        $this->db->bind('stambuk', $data['old_stambuk']);
        $fotoLama = $this->db->single()['foto'];

        // Menangani upload file foto baru
        $filePath = $fotoLama; // Default ke foto lama

        if (isset($file['foto']) && $file['foto']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $file['foto']['tmp_name'];
            $fileExtension = pathinfo($file['foto']['name'], PATHINFO_EXTENSION);
            $allowedExtensions = ['jpg', 'jpeg', 'png']; // Ekstensi yang diperbolehkan

            if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                return 0; // Ekstensi file tidak valid
            }

            // Tentukan nama file yang unik
            $fileName = uniqid() . '.' . $fileExtension;
            $uploadDir = 'assets/img/profil/'; // Direktori upload
            $filePath = $uploadDir . $fileName;

            // Pindahkan file ke folder upload
            if (!move_uploaded_file($fileTmpPath, $filePath)) {
                return 0; // Gagal upload
            }
            // Validasi ukuran file (contoh: maksimum 2MB)
            $maxFileSize = 2 * 1024 * 1024; // 2MB
            if ($file['foto']['size'] > $maxFileSize) {
                return 0;
            }

            // Hapus file foto lama jika ada
            if (!empty($fotoLama)) {
                $oldFilePath = __DIR__ . '/../../' . $fotoLama; // Path absolut file lama
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath); // Hapus file
                }
            }
        }

        // Query untuk update data mahasiswa
        $query = "UPDATE mahasiswa SET stambuk = :stambuk, nama = :nama, prodi = :prodi, idkelas = :idkelas, namaagama = :namaagama, email = :email, telepon = :telepon, jeniskelamin = :jeniskelamin, alamat = :alamat, foto = :foto WHERE stambuk = :old_stambuk";

        // Eksekusi query
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
        $this->db->bind('foto', $filePath); // Foto baru atau lama
        $this->db->bind('old_stambuk', $data['old_stambuk']); // Stambuk lama untuk pencocokan
        $this->db->execute();

        return $this->db->rowCount(); // Mengembalikan jumlah baris yang terpengaruh (1 jika berhasil)
    }
    //Digunakan pada Beranda.php
    public function countMahasiswa()
    {
        $this->db->query("SELECT COUNT(stambuk) AS jumlahMahasiswa FROM mahasiswa");
        return $this->db->single();
    }
    public function getmatkul()
    {
        $query = "SELECT mahasiswa.stambuk, tagihan.matakuliah FROM mahasiswa JOIN tagihan ON mahasiswa.stambuk = tagihan.stambuk";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    // Digunakan pada Datamahasiswamh.php
    public function getNamaByStambuk($stambuk)
    {
        $this->db->query("SELECT nama FROM mahasiswa WHERE stambuk = :stambuk");
        $this->db->bind('stambuk', $stambuk);
        $result = $this->db->single(); // Ambil data nama

        // Jika data tidak ditemukan, kembalikan nilai default
        return $result ? $result['nama'] : "Nama belum diisi";
    }

    //Digunakan pada Datamahasiswamh.php
    public function updateFotoMahasiswa($stambuk, $file)
    {
        // Ambil foto lama dari database
        $queryGetFotoLama = "SELECT foto FROM mahasiswa WHERE stambuk = :stambuk";
        $this->db->query($queryGetFotoLama);
        $this->db->bind('stambuk', $stambuk);
        $fotoLama = $this->db->single()['foto'];

        // Default path foto
        $filePath = $fotoLama;

        if (isset($file['foto']) && $file['foto']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $file['foto']['tmp_name'];
            $fileExtension = pathinfo($file['foto']['name'], PATHINFO_EXTENSION);
            $allowedExtensions = ['jpg', 'jpeg', 'png']; // Ekstensi yang diperbolehkan

            // Validasi ekstensi file
            if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                return 0; // Ekstensi file tidak valid
            }

            // Tentukan nama file yang unik
            $fileName = uniqid('') . '.' . $fileExtension;
            $uploadDir = 'assets/img/profil/'; // Direktori upload
            $filePath = $uploadDir . $fileName;

            // Validasi ukuran file (contoh: maksimum 2MB)
            $maxFileSize = 2 * 1024 * 1024; // 2MB
            if ($file['foto']['size'] > $maxFileSize) {
                return 0;
            }

            // Pindahkan file ke folder upload
            if (!move_uploaded_file($fileTmpPath, $filePath)) {
                return 0; // Gagal upload
            }
            // Hapus foto lama jika ada
            if (!empty($fotoLama)) {
                $oldFilePath = __DIR__ . '/../../' . $fotoLama; // Path absolut file lama
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath); // Hapus file
                }
            }
        }

        // Update foto baru di database
        $query = "UPDATE mahasiswa SET foto = :foto WHERE stambuk = :stambuk";
        $this->db->query($query);
        $this->db->bind('foto', $filePath);
        $this->db->bind('stambuk', $stambuk);
        $this->db->execute();

        return $this->db->rowCount(); // Mengembalikan jumlah baris yang terpengaruh (1 jika berhasil)
    }
}
