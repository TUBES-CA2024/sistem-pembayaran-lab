<?php
class Laporan extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'Laporan';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampil();
            $data['tagihan'] = $this->model('Tagihan_model')->tampil();

            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('Laporan/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Laporan");
            exit();
        }
    }
    public function filter()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ambil tanggal dari form
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            // Panggil model untuk mendapatkan laporan harian berdasarkan rentang tanggal
            $data['title'] = 'Laporan Harian';
            $data['laporan'] = $this->model('Pembayaran_model')->getLaporanByDateRange($startDate, $endDate);

            // Menampilkan laporan dengan data yang sesuai
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('Laporan/index', $data);  // Pastikan view yang sama digunakan
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Laporan");
            exit();
        }
    }
}
