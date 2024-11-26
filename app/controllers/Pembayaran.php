<?php

class Pembayaran extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'Pembayaran';
            $data['pembayaran'] = $this->model('Pembayaran_model')->tampil();
            $data['countpembayaran'] = $this->model('Pembayaran_model')->countPembayaran();
            $data['title'] = 'Pembayaran';
            $data['pembayaran'] = $this->model('Pembayaran_model')->tampil();
            $data['countpembayaran'] = $this->model('Pembayaran_model')->countPembayaran();
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampil(); // Tambahkan data mahasiswa
            $data['matkul'] = $this->model('Matkul_model')->tampil(); // Tambahkan data matkul


            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('Pembayaran/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Berandakp");
            exit();
        }
    }

    public function tambah()
    {
        // Validasi input sebelum menyimpan
        if (empty($_POST['stambuk']) || empty($_POST['nominal']) || empty($_POST['status'])) {
            Flasher::setFlash('Semua kolom wajib', 'diisi', 'danger');
            header('Location: ' . BASEURL . '/Pembayaran');
            exit;
        }

        if ($this->model('Pembayaran_model')->tambah($_POST) > 0) {
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
        // Validasi apakah data pembayaran ada
        // if (!$this->model('Pembayaran_model')->tampilById($id)) {
        //     Flasher::setFlash('Pembayaran tidak ditemukan', '', 'danger');
        //     header('Location: ' . BASEURL . '/Pembayaran');
        //     exit;
        // }
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

    public function editTampil()
    {
        echo json_encode($this->model('Pembayaran_model')->tampilById($_POST['id']));
    }

    public function editPembayaran()
    {
        if ($this->model('Pembayaran_model')->edit($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/Pembayaran');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/Pembayaran');
            exit;
        }
    }
}
