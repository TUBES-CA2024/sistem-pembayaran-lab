<?php

class Pembayaran extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'Pembayaran';
            $data['pembayaran'] = $this->model('Pembayaran_model')->tampil();
            $data['countpembayaran'] = $this->model('Pembayaran_model')->countPembayaran();
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampil(); // Tambahkan data mahasiswa
            $data['matkul'] = $this->model('Matkul_model')->tampil(); // Tambahkan data matkul

            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('Pembayaran/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/copyright');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Beranda");
            exit();
        }
    }
    public function editTampil($id)
    {
        $data['title'] = 'Edit Pembayaran Mahasiswa';
        $data['pembayaran'] = $this->model('Pembayaran_model')->tampilById($id);
        $data['countpembayaran'] = $this->model('Pembayaran_model')->countPembayaran();
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampilById($id);
        $data['matkul_select'] = $this->model('Select_matkul_model')->tampilById($id);
        $data['matkul'] = $this->model('Matkul_model')->tampil();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('Pembayaran/edit', $data);
        $this->view('templates/footersidebar');
        $this->view('templates/copyright');
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $idpembayaran = $this->model('Pembayaran_model')->tambah($_POST);

        if ($idpembayaran > 0) {
            $_POST['idpembayaran'] = $idpembayaran;

            $this->model('Select_matkul_model')->tambah($_POST);

            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Pembayaran');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Pembayaran');
            exit;
        }
    }

    public function hapus($id)
    {
        $this->model('Select_matkul_model')->hapus($id);
        $this->model('Mahasiswa_model')->hapus($id);
        if ($this->model('Pembayaran_model')->hapus($id) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/Pembayaran');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/Pembayaran');
            exit;
        }
    }

    public function editPembayaran()
    {
        $idpembayaran = $_POST['idpembayaran'];
        $this->model('Select_matkul_model')->hapusByIdPembayaran($idpembayaran);
        $this->model('Select_matkul_model')->tambah($_POST);
        if ($this->model('Pembayaran_model')->edit($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('Gagal', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/Pembayaran');
        exit;
    }
}
