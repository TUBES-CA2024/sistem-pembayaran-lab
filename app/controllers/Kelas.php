<?php
class Kelas extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'Kelas Mahasiswa';
            $data['kelas'] = $this->model('Kelas_model')->tampil();
            $data['countkelas'] = $this->model('Kelas_model')->countKelas();

            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('Kelas/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/copyright');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Berandakp");
            exit();
        }
    }

    public function tambahKelas()
    {
        if ($this->model('Kelas_model')->tambahkls($_POST) > 0) {
            PesanFlash::setFlash('Kelas Berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Kelas');
            exit;
        } else {
            PesanFlash::setFlash('Kelas Gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Kelas');
            exit;
        }
    }
    public function hapusKelas($id)
    {
        if ($this->model('Kelas_model')->hapuskls($id) > 0) {
            PesanFlash::setFlash('Kelas Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/Kelas');
            exit;
        } else {
            PesanFlash::setFlash('Kelas Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/Kelas');
            exit;
        }
    }
}
