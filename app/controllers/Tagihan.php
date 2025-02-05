<?php
class Tagihan extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'Tagihan';
            $data['counttagihan'] = $this->model('Tagihan_model')->countTagihan();
            $data['tagihan'] = $this->model('Tagihan_model')->tampil();

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
    public function hapus($id)
    {
        if ($this->model('Tagihan_model')->hapus($id) > 0) {
            PesanFlash::setFlash('Tagihan berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/Tagihan');
            exit;
        } else {
            PesanFlash::setFlash('Tagihan gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/Tagihan');
            exit;
        }
    }
    public function edit($id)
    {
        if (isset($_POST['stambuk'])) {
            $data = [
                'stambuk' => $_POST['stambuk'],
                'jumlah_tagihan' => $_POST['jumlah_tagihan'],
                'angkatan' => $_POST['angkatan'],
                'tahun_akademik' => $_POST['tahun_akademik'],
                'semester' => $_POST['semester'],
                'matakuliah' => $_POST['matakuliah']
            ];

            if ($this->model('Tagihan_model')->updateTagihan($id, $data)) {
                PesanFlash::setFlash('Tagihan berhasil', 'diupdate', 'success');
            } else {
                PesanFlash::setFlash('Tagihan gagal', 'diupdate', 'danger');
            }
            header('Location: ' . BASEURL . '/Tagihan');
            exit;
        }
    }
}
