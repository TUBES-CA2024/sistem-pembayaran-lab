<?php

class Datamahasiswamh extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] === 'Mahasiswa') {
            $stambuk = $_SESSION['stambuk'];
            $data['title'] = 'Data Mahasiswa';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampilByNim($stambuk);
            $data['nama'] = $this->model('Mahasiswa_model')->getNamaByStambuk($stambuk);
            $data['matkul'] = $this->model('Matkul_model')->tampil();
            $data['kelas'] = $this->model('Kelas_model')->tampil();
            $data['countmahasiswa'] = $this->model('Mahasiswa_model')->countMahasiswa();
            $data['isCompleted'] = $data['mahasiswa']['isCompleted'];

            $this->view('templates/header', $data);
            $this->view('templates/sidebarmh');
            $this->view('templates/profilhead', $data);
            $this->view('Datamahasiswamh/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/copyright');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Berandamh");
            exit();
        }
    }

    public function simpan()
    {
        if ($_SESSION['role'] === 'Mahasiswa') {
            $stambuk = $_SESSION['stambuk'];

            $_POST['stambuk'] = $stambuk;
            $mahasiswa = $this->model('Mahasiswa_model')->tampilByNim($stambuk);

            if ($mahasiswa['isCompleted'] == 1) {
                Flasher::setFlash('Anda sudah mengisi data', '', 'danger');
                header('Location: ' . BASEURL . '/Datamahasiswamh');
                exit();
            }
            if ($this->model('Mahasiswa_model')->tambah($_POST, $_FILES) > 0) {
                Flasher::setFlash('Data berhasil', 'disimpan', 'success');
                header('Location: ' . BASEURL . '/Datamahasiswamh');
                exit();
            } else {
                Flasher::setFlash('Gagal', 'menyimpan data', 'danger');
                header('Location: ' . BASEURL . '/Datamahasiswamh');
                exit();
            }
        }
    }

    public function updateFotoMahasiswa()
    {
        if ($_SESSION['role'] === 'Mahasiswa') {
            $stambuk = $_SESSION['stambuk'];

            if ($this->model('Mahasiswa_model')->updateFotoMahasiswa($stambuk, $_FILES) > 0) {
                Flasher::setFlash('Foto berhasil diperbarui', '', 'success');
            } else {
                Flasher::setFlash('Gagal memperbarui foto', '', 'danger');
            }
            header('Location: ' . BASEURL . '/Datamahasiswamh');
            exit();
        } else {
            header('Location: ' . BASEURL . '/Berandamh');
            exit();
        }
    }
}
