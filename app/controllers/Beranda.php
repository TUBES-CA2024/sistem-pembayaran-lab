<?php
session_start();

class Beranda extends Controller
{
    public function index()
    {
        if (isset($_SESSION['masuk'])) {
            if ($_SESSION['role'] == 'Admin') {
                $data['title'] = 'Beranda';
                $data['user'] = $this->model('User_model')->countUser();
                $data['mahasiswa'] = $this->model('Mahasiswa_model')->countMahasiswa();
                $data['matkul'] = $this->model('Matkul_model')->countMatkul();
                $data['kelas'] = $this->model('Kelas_model')->countKelas();
                $data['countpembayaran'] = $this->model('Pembayaran_model')->countPembayaran();
                $data['counttagihan'] = $this->model('Tagihan_model')->countTagihan();
                $data['pembayaran'] = $this->model('Pembayaran_model')->getLaporan();


                $this->view('templates/header', $data);
                $this->view('templates/sidebar');
                $this->view('Beranda/index', $data);
                $this->view('templates/footersidebar');
                $this->view('templates/footer');
            } else if ($_SESSION['role'] == 'Kepala Lab') {
                header("Location:" . BASEURL . "/Berandakp");
                exit();
            } else {
                header("Location:" . BASEURL . "/Berandamh");
                exit();
            }
        } else {
            header("Location:" . BASEURL . "/Login");
            exit();
        }
    }

    public function printPriode1()
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'Print Periode 1';
            $data['pembayaran'] = $this->model('Pembayaran_model')->getPeriode();

            $this->view('templates/header', $data);
            $this->view('Beranda/priode1', $data);
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Berandakp");
            exit();
        }
    }

    public function printPriode2()
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'Print Periode 2';
            $data['pembayaran'] = $this->model('Pembayaran_model')->getPeriode();

            $this->view('templates/header', $data);
            $this->view('Beranda/priode2', $data);
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Berandakp");
            exit();
        }
    }
}
