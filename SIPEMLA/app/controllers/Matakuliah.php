<?php

class Matakuliah extends Controller
{
    public function index()
    {
        if($_SESSION['role'] == 'Admin'){
            $data['title'] = 'Mata Kuliah';
            $data['matkul'] = $this->model('Matkul_model')->tampil();
            $data['countmatkul'] = $this->model('Matkul_model')->countMatkul();
    
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('Matakuliah/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        }else{
            header("Location:" . BASEURL . "/Berandakp");
            exit();
        }
    }
    public function tambah()
    {
        if ($this->model('Matkul_model')->tambah($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Matakuliah');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Matakuliah');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Matkul_model')->hapus($id) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/Matakuliah');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/Matakuliah');
            exit;
        }
    }

    public function editTampil()
    {
        echo json_encode($this->model('Matkul_model')->tampilById($_POST['id']));
    }
    public function editMatkul(){
        if ($this->model('Matkul_model')->edit($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/Matakuliah');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/Matakuliah');
            exit;
        }
    }
}
