<?php
session_start();

class Home extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            $data['title'] = 'Home';

            $this->view('templates/header', $data);
            $this->view('templates/navbar');
            $this->view('Home/index', $data);
            $this->view('templates/footer');
        } else {
            if ($_SESSION['role'] == 'Admin') {
                header("Location:" . BASEURL . "/Beranda");
                exit();
            } else {
                header("Location:" . BASEURL . "/Berandakp");
                exit();
            }
        }
    }

    public function check()
    {
        if (!isset($_SESSION['username'])) {
            $data['title'] = 'Check Pembayaran';
            $stambuk = $_POST['stambuk'];
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampilById($stambuk);
            $data['matkul_select'] = $this->model('Select_matkul_model')->tampilById($stambuk);
            $data['pembayaran'] = $this->model('Pembayaran_model')->tampilByStambuk($stambuk);
            $data['pmb'] = $this->model('Pembayaran_model')->tampilByStambuk_pmb($stambuk);
            if ($data['pembayaran'] > 0) {
                // $data['mahasiswa'];
                // $data['matkul_select'];
                // $data['pembayaran'];
                // $data['pmb'];
                $this->view('templates/header', $data);
                $this->view('templates/navbar');
                $this->view('Home/check', $data);
                $this->view('templates/footer');
            } else {
                stambukCek::setFlash('Stambuk', 'Tidak Ditemukan', 'danger');
                header('Location: ' . BASEURL . '/Home');
                exit;
            }
        } else {
            if ($_SESSION['role'] == 'Admin') {
                header("Location:" . BASEURL . "/Beranda");
                exit();
            } else {
                header("Location:" . BASEURL . "/Berandakp");
                exit();
            }
        }
    }

    public function daftarSudah()
    {
        if (!isset($_SESSION['username'])) {
            $data['title'] = 'Registrasi Pembayaran';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampil();
            $data['matkul'] = $this->model('Matkul_model')->tampil();
            $data['kelas'] = $this->model('Kelas_model')->tampil();

            $this->view('templates/header', $data);
            $this->view('templates/navbar');
            $this->view('Home/daftarSudah', $data);
            $this->view('templates/footer');
        } else {
            if ($_SESSION['role'] == 'Admin') {
                header("Location:" . BASEURL . "/Beranda");
                exit();
            } else {
                header("Location:" . BASEURL . "/Berandakp");
                exit();
            }
        }
    }

    public function sudahAda()
    {
        if ($this->model('Mahasiswa_model')->tampilByid($_POST["stambuk"]) > 0) {
            $this->model('Select_matkul_model')->hapus($_POST["stambuk"]);
            $this->model('Select_matkul_model')->tambah($_POST);
            $this->model('Pembayaran_model')->tambah($_POST);

            General::setFlash('Registrasi Pembayaran', 'Berhasil', 'success');
            header('Location: ' . BASEURL . '/Home');
            exit;
        } else {
            General::setFlash('Mahasiswa', 'Belum Terdaftar', 'danger');
            header('Location: ' . BASEURL . '/Home/daftarSudah');
            exit;
        }
    }

    public function daftarBelum()
    {
        if (!isset($_SESSION['username'])) {
            $data['title'] = 'Registrasi Pembayaran';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampil();
            $data['matkul'] = $this->model('Matkul_model')->tampil();
            $data['kelas'] = $this->model('Kelas_model')->tampil();

            $this->view('templates/header', $data);
            $this->view('templates/navbar');
            $this->view('Home/daftarBelum', $data);
            $this->view('templates/footer');
        } else {
            if ($_SESSION['role'] == 'Admin') {
                header("Location:" . BASEURL . "/Beranda");
                exit();
            } else {
                header("Location:" . BASEURL . "/Berandakp");
                exit();
            }
        }
    }

    public function belumAda()
    {
        if ($this->model('Mahasiswa_model')->tampilByid($_POST["stambuk"]) > 0) {
            General::setFlash('Mahasiswa', 'Sudah Terdaftar', 'danger');
            header('Location: ' . BASEURL . '/Home/daftarBelum');
            exit;
        } else {
            $this->model('Mahasiswa_model')->tambah($_POST);
            $this->model('Select_matkul_model')->hapus($_POST["stambuk"]);
            $this->model('Select_matkul_model')->tambah($_POST);
            $this->model('Pembayaran_model')->tambah($_POST);

            General::setFlash('Registrasi Pembayaran', 'Berhasil', 'success');
            header('Location: ' . BASEURL . '/Home');
            exit;
        }
    }
}