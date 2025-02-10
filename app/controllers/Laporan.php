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
            $data['laporan'] = $this->model('Pembayaran_model')->tampilkp();
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
    public function print()
    {

        if ($_SESSION['role'] == 'Admin') {

            $data['title'] = 'Riwayat Pembayaran';
            // Ambil data untuk rentang tanggal jika ada
            $data['title'] = 'Bukti Pembayaran';
            $data['stambuk'] = $_POST['stambuk'];
            $data['nama'] = $_POST['nama'];
            $data['semester'] = $_POST['semester'];
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
