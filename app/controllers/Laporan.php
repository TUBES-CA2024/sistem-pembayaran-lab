<?php
class Laporan extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'Laporan';
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampil();
            $data['tagihan'] = $this->model('Tagihan_model')->tampil();
            $data['countpembayaran'] = $this->model('Pembayaran_model')->countPembayaran();
            $data['laporan'] = [];

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
            $data['countpembayaran'] = $this->model('Pembayaran_model')->countPembayaran();

            // Simpan tanggal agar tetap tampil di form filter
            $data['startDate'] = $startDate;
            $data['endDate'] = $endDate;

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
    public function print()
    {

        if ($_SESSION['role'] == 'Admin') {

            $data['title'] = 'Riwayat Pembayaran';
            // Ambil data untuk rentang tanggal jika ada
            $data['title'] = 'Bukti Pembayaran';
            $data['stambuk'] = $_POST['stambuk'];
            $data['nama'] = $_POST['nama'];
            $data['matakuliah'] = $_POST['matakuliah'];
            $data['tanggal_pembayaran'] = $_POST['tanggal_pembayaran'];
            $data['jumlah_pembayaran'] = $_POST['jumlah_pembayaran'];
            $data['status'] = $_POST['status'];

            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('Laporan/print', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Laporan");
            exit();
        }
    }
}
