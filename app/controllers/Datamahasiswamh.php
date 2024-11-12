<?php

class Datamahasiswamh extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Mahasiswa') {
            $data['title'] = 'Data Mahasiswa';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampil();
            $data['matkul'] = $this->model('Matkul_model')->tampil();
            $data['kelas'] = $this->model('Kelas_model')->tampil();
            $data['countmahasiswa'] = $this->model('Mahasiswa_model')->countMahasiswa();

            $this->view('templates/header', $data);
            $this->view('templates/sidebarmh');
            $this->view('templates/profilhead');
            $this->view('Datamahasiswamh/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/copyright');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Beranda");
            exit();
        }
    }

    public function detailkp($id)
    {
        if ($_SESSION['role'] == 'Mahasiswa') {
            $data['title'] = 'Detail Data Mahasiswa';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampilById($id);
            $data['matkul_select'] = $this->model('Select_matkul_model')->tampilById($id);

            $this->view('templates/header', $data);
            $this->view('templates/sidebarmh');
            $this->view('Datamahasiswamh/detailkp', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Beranda");
            exit();
        }
    }
}
