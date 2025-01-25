<?php

class Usermanagement extends Controller
{
    public function index()
    {
        if ($_SESSION['role'] == 'Admin') {
            $data['title'] = 'User Management';
            $data['user'] = $this->model('User_model')->tampil();
            $data['countuser'] = $this->model('User_model')->countUser();

            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('Usermanagement/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Berandakp");
            exit();
        }
    }
    public function tambah()
    {
        if ($this->model('User_model')->tambah($_POST) > 0) {
            PesanFlash::setFlash('User Berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Usermanagement');
            exit;
        } else {
            PesanFlash::setFlash('User Gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Usermanagement');
            exit;
        }
    }
    public function hapus($id)
    {
        if ($this->model('User_model')->hapus($id) > 0) {
            PesanFlash::setFlash('User Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/Usermanagement');
            exit;
        } else {
            PesanFlash::setFlash('User Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/Usermanagement');
            exit;
        }
    }
    public function editTampil()
    {
        echo json_encode($this->model('User_model')->tampilById($_POST['id']));
    }

    public function editUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            if ($this->model('User_model')->edit($_POST) > 0) {
                PesanFlash::setFlash('User Berhasil', 'diubah', 'success');
                header('Location: ' . BASEURL . '/Usermanagement');
                exit;
            } else {
                PesanFlash::setFlash('User Gagal', 'diubah', 'danger');
                header('Location: ' . BASEURL . '/Usermanagement');
                exit;
            }
        }
    }
}
