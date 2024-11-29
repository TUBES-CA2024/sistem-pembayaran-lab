<?php

class Pembayaran extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Admin') {
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
            header("Location:" . BASEURL . "/Beranda");
            exit();
        }
    }
    public function editTampil($id)
    {
        $data['title'] = 'Edit Pembayaran Mahasiswa';
        $data['pembayaran'] = $this->model('Pembayaran_model')->tampilById($id);
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->tampilById($id);
        $data['matkul_select'] = $this->model('Select_matkul_model')->tampilById($id);
        $data['matkul'] = $this->model('Matkul_model')->tampil();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('Pembayaran/edit', $data);
        $this->view('templates/footersidebar');
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $idpembayaran = $this->model('Pembayaran_model')->tambah($_POST);

        if ($idpembayaran > 0) {
            $_POST['idpembayaran'] = $idpembayaran;

            $this->model('Select_matkul_model')->tambah($_POST);

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
        $this->model('Select_matkul_model')->hapus($id);
        $this->model('Mahasiswa_model')->hapus($id);
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

    // public function editTampil()
    // {
    //     echo json_encode($this->model('Pembayaran_model')->tampilById($_POST['id']));
    // }

    public function editPembayaran()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'idpembayaran' => $_POST['idpembayaran'],
                'stambuk' => $_POST['stambuk'],
                'waktupembayaran' => $_POST['waktupembayaran'],
                'status' => $_POST['status'],
                'kodematakuliah' => isset($_POST['kodematakuliah']) ? $_POST['kodematakuliah'] : [],
            ];

            // Hitung nominal berdasarkan jumlah mata kuliah yang dipilih
            $nominal = count($data['kodematakuliah']) * 55000;
            $data['nominal'] = $nominal;

            // Update data pembayaran
            if ($this->model('Pembayaran_model')->edit($data) > 0) {
                // Update mata kuliah yang dipilih
                $this->model('Pembayaran_model')->updateMatkul($data['idpembayaran'], $data['kodematakuliah']);

                Flasher::setFlash('Pembayaran', 'berhasil diperbarui', 'success');
                header('Location: ' . BASEURL . '/Pembayaran');
                exit;
            } else {
                Flasher::setFlash('Pembayaran', 'gagal diperbarui', 'danger');
                header('Location: ' . BASEURL . '/Pembayaran');
                exit;
            }
        }
    }
}

  // if ($this->model('Pembayaran_model')->tambah($_POST) > 0) {
        //     $this->model('Select_matkul_model')->tambah($_POST);
        //     Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
        //     header('Location: ' . BASEURL . '/Pembayaran');
        //     exit;
        // } else {
        //     Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
        //     header('Location: ' . BASEURL . '/Pembayaran');
        //     exit;
        // }