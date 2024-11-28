<?php

class Pembayaranmh extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Mahasiswa') {
            $stambuk = $_SESSION['stambuk'];
            $data['title'] = 'Pembayaran';
            $data['nama'] = $this->model('Mahasiswa_model')->getNamaByStambuk($stambuk);
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampilByNim($stambuk);
            $data['pembayaran'] = $this->model('Pembayaran_model')->tampilByStambuk_pmb($stambuk);
            $data['history'] = $this->model('Pembayaran_model')->tampilHistory($stambuk);
            // $data['pembayaran'] = $this->model('Pembayaran_model')->tampilByStambuk($stambuk);
            // $data['countpembayaran'] = count($data['pembayaran']);
            // $data['countpembayaran'] = $this->model('Pembayaran_model')->countPembayaran();

            $this->view('templates/header', $data);
            $this->view('templates/sidebarmh');
            $this->view('templates/profilhead', $data);
            $this->view('Pembayaranmh/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/copyright');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Beranda");
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
            $this->view('templates/copyright');
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

            // Validasi: Minimal satu mata kuliah harus dipilih
            if (empty($_POST['kodematakuliah'])) {
                Flasher::setFlash('Pilih minimal satu mata kuliah', '', 'danger');
                header('Location: ' . BASEURL . '/Pembayaranmh/registrasi');
                exit;
            }


            // Menambahkan data ke tabel pembayaran
            $idpembayaran = $this->model('Pembayaran_model')->tambah($_POST);

            if ($idpembayaran > 0) {
                // Jika pembayaran berhasil ditambahkan, ambil idpembayaran
                $_POST['idpembayaran'] = $idpembayaran;

                // Menambahkan data ke tabel matkul_select
                $this->model('Select_matkul_model')->tambah($_POST);

                Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/Pembayaranmh');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/Pembayaranmh');
                exit;
            }
        }
    }
}
