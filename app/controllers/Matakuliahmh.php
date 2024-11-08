<?php

class Matakuliahmh extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Mahasiswa') {
            $data['title'] = 'Mata Kuliah';
            $data['matkul'] = $this->model('Matkul_model')->tampil();
            $data['countmatkul'] = $this->model('Matkul_model')->countMatkul();

            $this->view('templates/header', $data);
            $this->view('templates/sidebarmh');
            $this->view('Matakuliahmh/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Beranda");
            exit();
        }
    }
}
