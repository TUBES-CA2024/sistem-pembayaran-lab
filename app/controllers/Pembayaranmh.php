<?php

class Pembayaranmh extends Controller
<<<<<<< HEAD
    {
        public function index()
        {
=======
{
    public function index()
    {
>>>>>>> master
        if ($_SESSION['role'] == 'Mahasiswa') {
            $data['title'] = 'Pembayaran';
            $data['pembayaran'] = $this->model('Pembayaran_model')->tampil();
            $data['countpembayaran'] = $this->model('Pembayaran_model')->countPembayaran();

            $this->view('templates/header', $data);
            $this->view('templates/sidebarmh');
            $this->view('templates/profilhead');
<<<<<<< HEAD
            $this->view('Pembayaran/index', $data);
=======
            $this->view('Pembayaranmh/index', $data);
>>>>>>> master
            $this->view('templates/footersidebar');
            $this->view('templates/copyright');
            $this->view('templates/footer');
        } else {
            header("Location:" . BASEURL . "/Beranda");
            exit();
        }
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> master
