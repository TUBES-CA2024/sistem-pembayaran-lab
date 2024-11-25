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
        $nominal = count($_POST['kodematakuliah']) * 55000;
        $_POST['nominal'] = $nominal;
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $pembayaran = $this->model('Pembayaran_model')->tampilById($id);

            if ($pembayaran) {
                $matkul = $this->model('Matkul_model')->gettampilByPembayaran($id);
                $pembayaran['kodematakuliah'] = array_column($matkul, 'kodematakuliah'); // Ambil kode mata kuliah
                echo json_encode($pembayaran);
            } else {
                echo json_encode(['error' => 'Data tidak ditemukan']);
            }
        }
    }


    public function editPembayaran()
    {
        $nominal = count($_POST['kodematakuliah']) * 55000;
        $_POST['nominal'] = $nominal;

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
