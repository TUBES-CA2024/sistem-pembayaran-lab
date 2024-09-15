<?php

class Datamahasiswakp extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Kepala Lab') {
            $data['title'] = 'Data Mahasiswa';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampil();
            $data['matkul'] = $this->model('Matkul_model')->tampil();
            $data['kelas'] = $this->model('Kelas_model')->tampil();
            $data['countmahasiswa'] = $this->model('Mahasiswa_model')->countMahasiswa();

            $this->view('templates/header', $data);
            $this->view('templates/sidebarkp');
            $this->view('Datamahasiswakp/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Beranda");
            exit();
        }
    }

    public function detailkp($id)
    {
        if ($_SESSION['role'] == 'Kepala Lab') {
            $data['title'] = 'Detail Data Mahasiswa';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampilById($id);
            $data['matkul_select'] = $this->model('Select_matkul_model')->tampilById($id);

            $this->view('templates/header', $data);
            $this->view('templates/sidebarkp');
            $this->view('Datamahasiswakp/detailkp', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Beranda");
            exit();
        }
    }
}
