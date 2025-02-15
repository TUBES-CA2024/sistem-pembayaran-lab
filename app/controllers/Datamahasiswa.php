<?php

class Datamahasiswa extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'Data Mahasiswa';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampil();
            $data['matkul'] = $this->model('Matkul_model')->tampil();
            $data['kelas'] = $this->model('Kelas_model')->tampil();
            $data['countmahasiswa'] = $this->model('Mahasiswa_model')->countMahasiswa();

            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('Datamahasiswa/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Berandakp");
            exit();
        }
    }


    public function detail($stambuk)
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'Detail Data Mahasiswa';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampilById($stambuk);
            // $data['matkul_select'] = $this->model('Select_matkul_model')->tampilMatkul($id);

            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('Datamahasiswa/detail', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Berandakp");
            exit();
        }
    }

    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tampilByid($_POST["stambuk"]) > 0) {
            PesanFlash::setFlash('Data Mahasiswa', 'Telah Tersedia', 'danger');
            header('Location: ' . BASEURL . '/Datamahasiswa');
            exit;
        }

        if ($this->model('Mahasiswa_model')->tambah($_POST, $_FILES) > 0) {
            PesanFlash::setFlash('Data Berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Datamahasiswa');
            exit;
        } else {
            PesanFlash::setFlash('Data Gagal', 'Tambah', 'danger');
            header('Location: ' . BASEURL . '/Datamahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        // Cek apakah tagihan terkait dengan pembayaran
        $tagihan = $this->model('Tagihan_model')->cekTagihan($id); // Cek apakah ada pembayaran terkait dengan tagihan

        if ($tagihan > 0) {
            // Jika ada pembayaran, tampilkan pesan error bahwa tagihan gagal dihapus
            PesanFlash::setFlash('Mahasiswa gagal', 'dihapus karena sudah ada tagihan terkait.', 'danger');
            header('Location: ' . BASEURL . '/Datamahasiswa');
            exit;
        } else {
            if ($this->model('Mahasiswa_model')->hapus($id) > 0) {
                PesanFlash::setFlash('Data Berhasil', 'dihapus', 'success');
                header('Location: ' . BASEURL . '/Datamahasiswa');
                exit;
            } else {
                PesanFlash::setFlash('Data Gagal', 'dihapus', 'danger');
                header('Location: ' . BASEURL . '/Datamahasiswa');
                exit;
            }
        }
    }

    public function editTampil($id)
    {
        $data['title'] = 'Edit Data Mahasiswa';
        $data['kelas'] = $this->model('Kelas_model')->tampil();
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampilById($id);
        // $data['pembayaran'] = $this->model('Pembayaran_model')->tampilByStambuk($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('Datamahasiswa/edit', $data);
        $this->view('templates/footersidebar');
        $this->view('templates/footer');
    }

    public function editMahasiswa()
    {
        if (!isset($_POST['isCompleted'])) {
            $_POST['isCompleted'] = 0;
        }

        if ($this->model('Mahasiswa_model')->edit($_POST, $_FILES) > 0) {
            PesanFlash::setFlash('Data Berhasil', 'diperbarui', 'success');
            header('Location: ' . BASEURL . '/Datamahasiswa');
            exit;
        } else {
            PesanFlash::setFlash('Data Gagal', 'diperbarui', 'danger');
            header('Location: ' . BASEURL . '/Datamahasiswa');
            exit;
        }
    }
}
