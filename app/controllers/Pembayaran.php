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
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Berandakp");
            exit();
        }
    }

    public function tambah()
    {
        // Menambahkan data ke tabel pembayaran
        $idpembayaran = $this->model('Pembayaran_model')->tambah($_POST);

        if ($idpembayaran > 0) {
            // Jika pembayaran berhasil ditambahkan, ambil idpembayaran
            $_POST['idpembayaran'] = $idpembayaran;

            // Menambahkan data ke tabel matkul_select
            $this->model('Select_matkul_model')->tambah($_POST);

            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Pembayaran');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Pembayaran');
            exit;
        }
        // if ($this->model('Pembayaran_model')->tambah($_POST) > 0) {
        //     $this->model('Select_matkul_model')->tambah($_POST);
        //     Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
        //     header('Location: ' . BASEURL . '/Pembayaran');
        //     exit;
        // } else {
        //     Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
        //     header('Location: ' . BASEURL . '/Pembayaran');
        //     exit;
        // }
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

    public function editTampil()
    {
        echo json_encode($this->model('Pembayaran_model')->tampilById($_POST['id']));
    }

    public function editPembayaran($id)
    {
        if ($this->model('Pembayaran_model')->edit($_POST) > 0) {
            $this->model('Select_matkul_model')->hapus($id);
            $this->model('Select_matkul_model')->tambah($_POST);
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
