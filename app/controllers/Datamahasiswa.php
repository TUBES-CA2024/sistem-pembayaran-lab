<?php

class Datamahasiswa extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'Data Mahasiswa';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampil();
            $data['matkul'] = $this->model('Matkul_model')->tampil();
            $data['kelas'] = $this->model('Kelas_model')->tampil();
            $data['countmahasiswa'] = $this->model('Mahasiswa_model')->countMahasiswa();

            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('Datamahasiswa/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Berandakp");
            exit();
        }
    }


    public function detail($id)
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'Detail Data Mahasiswa';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampilById($id);
            $data['matkul_select'] = $this->model('Select_matkul_model')->tampilById($id);

            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('Datamahasiswa/detail', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Berandakp");
            exit();
        }
    }

    public function tambah()
    {

        if ($this->model('Mahasiswa_model')->tampilByid($_POST["stambuk"]) > 0) {
            Flasher::setFlash('Data Mahasiswa', 'Telah Tersedia', 'danger');
            header('Location: ' . BASEURL . '/Datamahasiswa');
            exit;
        } else if($this->model('Mahasiswa_model')->tambah($_POST) > 0) {
            $this->model('Select_matkul_model')->tambah($_POST);
            $this->model('Pembayaran_model')->tambah($_POST);
            Flasher::setFlash('Data Berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Datamahasiswa');
            exit;
        }else{
            Flasher::setFlash('Data Gagal', 'Tambah', 'danger');
            header('Location: ' . BASEURL . '/Datamahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        $this->model('Pembayaran_model')->hapusByStambuk($id);
        $this->model('Select_matkul_model')->hapus($id);
        if ($this->model('Mahasiswa_model')->hapus($id) > 0) {
            General::setFlash('Data Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/Datamahasiswa');
            exit;
        } else {
            General::setFlash('Data Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/Datamahasiswa');
            exit;
        }
    }

    public function editTampil($id)
    {
        $data['title'] = 'Edit Data Mahasiswa';
        $data['matkul'] = $this->model('Matkul_model')->tampil();
        $data['kelas'] = $this->model('Kelas_model')->tampil();
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampilById($id);
        $data['matkul_select'] = $this->model('Select_matkul_model')->tampilById($id);
        $data['pembayaran'] = $this->model('Pembayaran_model')->tampilByStambuk($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('Datamahasiswa/edit', $data);
        $this->view('templates/footersidebar');
        $this->view('templates/footer');
    }

    public function editMahasiswa()
    {
        if ($this->model('Mahasiswa_model')->edit($_POST) > 0) {
            $this->model('Select_matkul_model')->hapus($_POST["old_stambuk"]);
            $this->model('Select_matkul_model')->tambah($_POST);$this->model('Pembayaran_model')->edit($_POST);
            General::setFlash('Data Berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/Datamahasiswa');
            exit;
        } else {
            General::setFlash('Tolong Ubah', 'Stambuk, Nama, Kelas atau Prodi', 'danger');
            header('Location: ' . BASEURL . '/Datamahasiswa');
            exit;
        }
    }
}
