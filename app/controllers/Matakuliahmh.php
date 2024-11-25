<?php

class Matakuliahmh extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Mahasiswa') {
            $stambuk = $_SESSION['stambuk'];
            $data['title'] = 'Mata Kuliah';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampilByNim($stambuk);
            $data['nama'] = $this->model('Mahasiswa_model')->getNamaByStambuk($stambuk);
            $data['matkul'] = $this->model('Matkul_model')->tampil();
            $data['countmatkul'] = $this->model('Matkul_model')->countMatkul();

            $this->view('templates/header', $data);
            $this->view('templates/sidebarmh');
            $this->view('templates/profilhead', $data);
            $this->view('Matakuliahmh/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/copyright');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Berandamh");
            exit();
        }
    }
}
