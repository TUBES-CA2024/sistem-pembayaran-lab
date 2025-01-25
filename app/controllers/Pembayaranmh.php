<?php

class Pembayaranmh extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Mahasiswa') {
            $stambuk = $_SESSION['stambuk'];
            $data['title'] = 'Pembayaran';
            $mahasiswa = $this->model('Mahasiswa_model')->tampilByNim($stambuk);
            $data['nama'] = $this->model('Mahasiswa_model')->getNamaByStambuk($stambuk);
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampilByNim($stambuk);
            $data['pembayaran'] = $this->model('Pembayaran_model')->tampil();
            $data['history'] = $this->model('Pembayaran_model')->tampilHistory($stambuk);
            $data['matkul'] = $this->model('Matkul_model')->tampil();
            $data['prodi'] = $mahasiswa['prodi'];

            $this->view('templates/header', $data);
            $this->view('templates/sidebarmh');
            $this->view('templates/profilhead', $data);
            $this->view('Pembayaranmh/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Beranda");
            exit();
        }
    }

    public function history()
    {
        if ($_SESSION['role'] == 'Mahasiswa') {
            $stambuk = $_SESSION['stambuk']; // Ambil stambuk dari session
            $mahasiswa = $this->model('Mahasiswa_model')->tampilByNim($stambuk);
            $data['title'] = 'Riwayat Pembayaran';
            $data['nama'] = $this->model('Mahasiswa_model')->getNamaByStambuk($stambuk);
            $data['prodi'] = $mahasiswa['prodi'];   // Ambil prodi dari data mahasiswa
            $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaranByStambuk($stambuk);

            $this->view('templates/header', $data);
            $this->view('templates/sidebarmh');
            $this->view('Pembayaranmh/history', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Login");
            exit();
        }
    }

    public function registrasi()
    {
        if ($_SESSION['role'] == 'Mahasiswa') {
            $data['title'] = 'Registrasi Pembayaran';
            $data['matkul'] = $this->model('Matkul_model')->tampil();

            $this->view('templates/header', $data);
            $this->view('templates/sidebarmh');
            $this->view('Pembayaranmh/registrasi', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Pembayaranmh");
            exit();
        }
    }

    public function tambah()
    {
        if ($_SESSION['role'] == 'Mahasiswa') {
            $stambuk = $_SESSION['stambuk'];
            $_POST['stambuk'] = $stambuk;

            if (empty($_POST['kodematakuliah'])) {
                PesanFlash::setFlash('Pilih minimal satu mata kuliah', '', 'danger');
                header('Location: ' . BASEURL . '/Pembayaranmh/registrasi');
                exit;
            }
            $idpembayaran = $this->model('Pembayaran_model')->tambah($_POST);
            if ($idpembayaran > 0) {
                $_POST['idpembayaran'] = $idpembayaran;
                $this->model('Select_matkul_model')->tambah($_POST);
                PesanFlash::setFlash('Pembayaran Berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/Pembayaranmh');
                exit;
            } else {
                PesanFlash::setFlash('Pembayaran Gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/Pembayaranmh');
                exit;
            }
        }
    }
}
