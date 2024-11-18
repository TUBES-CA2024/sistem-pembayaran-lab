<?php

class Pembayaranmh extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Mahasiswa') {
            $data['title'] = 'Pembayaran';
            $data['pembayaran'] = $this->model('Pembayaran_model')->tampil();
            $data['countpembayaran'] = $this->model('Pembayaran_model')->countPembayaran();

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
            $data['title'] = 'Registrasi Pembayaran';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampil();
            $data['matkul'] = $this->model('Matkul_model')->tampil();
            $data['kelas'] = $this->model('Kelas_model')->tampil();

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
}
