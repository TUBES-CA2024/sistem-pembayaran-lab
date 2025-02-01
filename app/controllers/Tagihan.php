<?php
class Tagihan extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'Tagihan';
            // $data['pembayaran'] = $this->model('Pembayaran_model')->tampil();
            // $data['countpembayaran'] = $this->model('Pembayaran_model')->countPembayaran();
            // $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampil(); // Tambahkan data mahasiswa
            $data['matkul'] = $this->model('Matkul_model')->tampil(); // Tambahkan data matkul

            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('Tagihan/index', $data);
            $this->view('templates/footersidebar');

            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Beranda");
            exit();
        }
    }
    public function tambah()
    {
        // Cek apakah ada file yang diupload
        if (isset($_FILES['excel_file'])) {
            $file = $_FILES['excel_file'];

            // Pastikan file tidak error
            if ($file['error'] == 0) {
                // Panggil model untuk memproses file Excel
                $data = $this->model('Tagihan_model')->processExcelFile($file['tmp_name']);

                if ($data) {
                    // Loop melalui data dan insert ke database
                    foreach ($data as $excelData) {
                        $this->model('Tagihan_model')->insertTagihanFromExcel($excelData);
                    }

                    // Set pesan sukses dan redirect
                    PesanFlash::setFlash('Tagihan berhasil', 'ditambahkan', 'success');
                    header('Location: ' . BASEURL . '/Tagihan');
                    exit;
                } else {
                    // Set pesan gagal dan redirect
                    PesanFlash::setFlash('Gagal memproses file Excel', '', 'danger');
                    header('Location: ' . BASEURL . '/Tagihan');
                    exit;
                }
            }
        }
    }
}
