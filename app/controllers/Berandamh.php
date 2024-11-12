<?php

class Berandamh extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Mahasiswa') {
            $data['title'] = 'Beranda';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->countMahasiswa();
            $data['user'] = $this->model('User_model')->countUser();
            $data['matkul'] = $this->model('Matkul_model')->countMatkul();
            $data['pembayaran'] = $this->model('Pembayaran_model')->countPembayaran();

            $this->view('templates/header', $data);
            $this->view('templates/sidebarmh');
            $this->view('templates/profilhead');
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
