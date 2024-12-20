<?php

class Mahasiswa_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambah($data, $file)
    {
        if (empty($data['stambuk']) || empty($data['nama']) || empty($data['idkelas'])) {
            return 0;
        }
        $filePath = null;
        if (isset($file['foto']) && $file['foto']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $file['foto']['tmp_name'];
            $fileExtension = pathinfo($file['foto']['name'], PATHINFO_EXTENSION);
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                return 0;
            }
            $fileName = uniqid('') . '.' . $fileExtension;
            $uploadDir = 'assets/img/profil/';
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
        $this->db->bind('foto', $filePath);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateFoto($iduser, $fileName)
    {
        $query = "UPDATE user SET foto = :foto WHERE iduser = :iduser";
        $this->db->query($query);
        $this->db->bind('foto', $fileName);
        $this->db->bind('iduser', $iduser);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tampil()
    {
        $this->db->query("SELECT mahasiswa.stambuk, mahasiswa.nama, mahasiswa.prodi, kelas.namekelas, mahasiswa.namaagama, mahasiswa.email, mahasiswa.telepon, mahasiswa.jeniskelamin, mahasiswa.alamat, mahasiswa.foto, mahasiswa.isCompleted FROM mahasiswa JOIN kelas ON mahasiswa.idkelas = kelas.idkelas");
        return $this->db->resultSet();
    }

    // public function hapus($id)
    // {
    //     $query = "DELETE FROM mahasiswa WHERE stambuk = :stambuk";
    //     $this->db->query($query);
    //     $this->db->bind('stambuk', $id);
    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }
    public function hapus($id)
    {
        // Ambil data mahasiswa untuk mendapatkan nama file foto
        $queryGetFoto = "SELECT foto FROM mahasiswa WHERE stambuk = :stambuk";
        $this->db->query($queryGetFoto);
        $this->db->bind('stambuk', $id);
        $foto = $this->db->single()['foto']; // Ambil nama file foto

        // Hapus file foto jika ada
        if (!empty($foto)) {
            // Gunakan path absolut yang benar
            $pathFoto = __DIR__ . "/../../assets/img/profil/" . $foto; // Sesuaikan lokasi folder

            // Cek apakah file benar-benar ada
            if (file_exists($pathFoto)) {
                unlink($pathFoto); // Hapus file
            }
        }

        // Hapus data mahasiswa dari database
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

    public function edit($data, $file)
    {
        // Validasi input
        if (empty($data['stambuk']) || empty($data['nama']) || empty($data['idkelas'])) {
            return 0; // Data tidak lengkap
        }

        // Menangani upload file foto
        $filePath = null;
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
        } else {
            // Jika tidak ada file yang di-upload, gunakan foto lama
            // Pastikan $_POST['foto_lama'] ada dan berisi foto lama
            $filePath = isset($data['foto_lama']) ? $data['foto_lama'] : null;
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
    public function getNamaByStambuk($stambuk)
    {
        $this->db->query("SELECT nama FROM mahasiswa WHERE stambuk = :stambuk");
        $this->db->bind('stambuk', $stambuk);
        $result = $this->db->single();

        // Jika data tidak ditemukan, kembalikan nilai default
        return $result ? $result['nama'] : "Nama belum diisi";
    }
    public function updateFotoMahasiswa($stambuk, $file)
    {
        // Default path foto
        $filePath = null;

        if (isset($file['foto']) && $file['foto']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $file['foto']['tmp_name'];
            $fileExtension = pathinfo($file['foto']['name'], PATHINFO_EXTENSION);
            $allowedExtensions = ['jpg', 'jpeg', 'png']; // Ekstensi yang diperbolehkan

            // Validasi ekstensi file
            if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                return 0; // Ekstensi file tidak valid
            }
            $fileName = uniqid('') . '.' . $fileExtension;
            $uploadDir = 'assets/img/profil/';
            $filePath = $uploadDir . $fileName;

            if (!move_uploaded_file($fileTmpPath, $filePath)) {
                return 0; // Gagal upload
            }
        }

        // Update foto di database
        $query = "UPDATE mahasiswa SET foto = :foto WHERE stambuk = :stambuk";
        $this->db->query($query);
        $this->db->bind('foto', $filePath);
        $this->db->bind('stambuk', $stambuk);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
