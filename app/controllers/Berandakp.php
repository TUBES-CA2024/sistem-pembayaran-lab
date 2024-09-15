<?php

class Berandakp extends Controller {
    public function index()
    {
        if($_SESSION['role'] == 'Kepala Lab'){
            $data['title'] = 'Beranda';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->countMahasiswa();
                $data['user'] = $this->model('User_model')->countUser();
                $data['matkul'] = $this->model('Matkul_model')->countMatkul();
                $data['pembayaran'] = $this->model('Pembayaran_model')->countPembayaran();
    
            $this->view('templates/header', $data);
            $this->view('templates/sidebarkp');
            $this->view('Berandakp/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        }else{
            header("Location:" . BASEURL . "/Beranda");
            exit();
        }
    }
}