<?php

class Pembayaranmh extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Mahasiswa') {
            $data['title'] = 'Pembayaran';
            $data['pembayaran'] = $this->model('Pembayaran_model')->tampil();
            $data['countpembayaran'] = $this->model('Pembayaran_model')->countPembayaran();
            
            // Ambil data matakuliah dari model
            $data['matkul'] = $this->model('Matkul_model')->tampil();

            // Memuat view
            $this->view('templates/header', $data);
            $this->view('templates/sidebarmh');
            $this->view('templates/profilhead');
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
            if (isset($_POST['kodematakuliah'])) {
                // Ambil data dari form
                $data = [
                    'iduser' => $_SESSION['iduser'], // Misalnya menggunakan iduser yang ada di session
                    'stambuk' => $_POST['stambuk'], // Pastikan ada stambuk di form
                    'kodematakuliah' => $_POST['kodematakuliah'], // Kode matakuliah yang dipilih
                    'waktupembayaran' => date('Y-m-d'), // Waktu pembayaran
                    'nominal' => $_POST['nominal'], // Nominal pembayaran (misalnya dari form)
                    'status' => 'Pending' // Status bisa disesuaikan
                ];

                // Simpan data pembayaran
                $this->model('Pembayaran_model')->tambah($data);

                // Redirect atau beri pesan sukses
                Flasher::setFlash('Pembayaran berhasil', 'success');
                header('Location: ' . BASEURL . '/Pembayaranmh');
                exit();
            }

            // Ambil data untuk form
            $data['title'] = 'Registrasi Pembayaran';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampil();
            $data['matkul'] = $this->model('Matkul_model')->tampil();
            $data['kelas'] = $this->model('Kelas_model')->tampil();

            // Memuat view
            $this->view('templates/header', $data);
            $this->view('templates/sidebarmh');
            $this->view('templates/profilhead');
            $this->view('Pembayaranmh/registrasi', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/copyright');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Pembayaranmh");
            exit();
        }
    }
   
    public function history()
    {
        if ($_SESSION['role'] == 'Mahasiswa') {
            // Ambil data pembayaran dengan status Lunas
            $data['title'] = 'History Pembayaran';
            $data['pembayaran'] = $this->model('Pembayaran_model')->getHistoryPembayaran();

            // Memuat view
            $this->view('templates/header', $data);
            $this->view('templates/sidebarmh');
            $this->view('templates/profilhead');
            $this->view('Pembayaranmh/index', $data); // View khusus untuk history pembayaran
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Beranda");
            exit();
        }
    }
}
