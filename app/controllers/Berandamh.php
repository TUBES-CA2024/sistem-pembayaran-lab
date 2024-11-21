<?php

class Berandamh extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Mahasiswa') {
            $stambuk = $_SESSION['stambuk'];
            $data['title'] = 'Beranda';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampilByNim($stambuk);
            $data['nama'] = $this->model('Mahasiswa_model')->getNamaByStambuk($stambuk);
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->countMahasiswa();
            $data['user'] = $this->model('User_model')->countUser();
            $data['matkul'] = $this->model('Matkul_model')->countMatkul();
            $data['pembayaran'] = $this->model('Pembayaran_model')->countPembayaran();

            $this->view('templates/header', $data);
            $this->view('templates/sidebarmh');
            $this->view('templates/profilhead', $data);
            $this->view('Berandamh/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/copyright');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Beranda");
            exit();
        }
    }
}
