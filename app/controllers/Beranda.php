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
                $data['countLunas'] = $this->model('Pembayaran_model')->countLunas();
                $data['countBelumLunas'] = $this->model('Pembayaran_model')->countBelumLunas();
                $data['counttagihan'] = $this->model('Tagihan_model')->countTagihan();
                $data['pembayaran'] = [];

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
    public function CariTanggal()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ambil tanggal dari form
            $startDate = $_POST['start_date'];
            $endDate   = $_POST['end_date'];


            // Panggil model untuk mendapatkan laporan harian berdasarkan rentang tanggal
            $data['title'] = 'Laporan Harian';
            $data['pembayaran'] = $this->model('Pembayaran_model')->getLaporanByDateRange($startDate, $endDate);
            $data['user'] = $this->model('User_model')->countUser();
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->countMahasiswa();
            $data['matkul'] = $this->model('Matkul_model')->countMatkul();
            $data['kelas'] = $this->model('Kelas_model')->countKelas();
            $data['countpembayaran'] = $this->model('Pembayaran_model')->countPembayaran();
            $data['countLunas'] = $this->model('Pembayaran_model')->countLunas();
            $data['countBelumLunas'] = $this->model('Pembayaran_model')->countBelumLunas();
            $data['counttagihan'] = $this->model('Tagihan_model')->countTagihan();

            // Simpan tanggal agar tetap tampil di form filter
            $data['startDate'] = $startDate;
            $data['endDate'] = $endDate;

            // Menampilkan laporan dengan data yang sesuai
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('Beranda/index', $data);  // Pastikan view yang sama digunakan
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Beranda");
            exit();
        }
    }

    public function printPriode1()
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'Print Periode 1';
            // $data['pembayaran'] = $this->model('Pembayaran_model')->tampil();

            $data['print'] = []; // Pastikan array kosong di awal
            // Pastikan 'stambuk' ada di dalam $_POST dan merupakan array
            if (isset($_POST['stambuk']) && is_array($_POST['stambuk'])) {
                foreach ($_POST['stambuk'] as $print) {
                    $datamahasiswa = $this->model('Pembayaran_model')->getPeriode($print);
                    if ($datamahasiswa) {
                        $data['print'] = array_merge($data['print'], $datamahasiswa);
                    }
                }
            } else {
                // Jika tidak ada checkbox yang dipilih
                $data['message'] = 'Tidak ada mahasiswa yang dipilih!';
            }

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
            $data['pembayaran'] = $this->model('Pembayaran_model')->tampil();
            $data['print'] = [];
            // Pastikan 'stambuk' ada di dalam $_POST dan merupakan array
            if (isset($_POST['stambuk']) && is_array($_POST['stambuk'])) {
                foreach ($_POST['stambuk'] as $print) {
                    $datamahasiswa = $this->model('Pembayaran_model')->getPeriode($print);
                    if ($datamahasiswa) {
                        $data['print'] = array_merge($data['print'], $datamahasiswa);
                    }
                }
            } else {
                // Jika tidak ada checkbox yang dipilih
                $data['message'] = 'Tidak ada mahasiswa yang dipilih!';
            }
            $this->view('templates/header', $data);
            $this->view('Beranda/priode2', $data);
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Berandakp");
            exit();
        }
    }

    public function printPriode3()
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'Print Periode 3';
            $data['pembayaran'] = $this->model('Pembayaran_model')->tampil();
            $data['print'] = [];
            // Pastikan 'stambuk' ada di dalam $_POST dan merupakan array
            if (isset($_POST['stambuk']) && is_array($_POST['stambuk'])) {
                foreach ($_POST['stambuk'] as $print) {
                    $datamahasiswa = $this->model('Pembayaran_model')->getPeriode($print);
                    if ($datamahasiswa) {
                        $data['print'] = array_merge($data['print'], $datamahasiswa);
                    }
                }
            } else {
                // Jika tidak ada checkbox yang dipilih
                $data['message'] = 'Tidak ada mahasiswa yang dipilih!';
            }
            $this->view('templates/header', $data);
            $this->view('Beranda/priode3', $data);
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Berandakp");
            exit();
        }
    }
}
