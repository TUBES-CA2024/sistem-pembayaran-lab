<?php

class Pembayarankp extends Controller {
    public function index()
    {
        if($_SESSION['role'] == 'Kepala Lab'){
            $data['title'] = 'Pembayaran';
            $data['pembayaran'] = $this->model('Pembayaran_model')->tampil();
            $data['countpembayaran'] = $this->model('Pembayaran_model')->countPembayaran();
    
            $this->view('templates/header', $data);
            $this->view('templates/sidebarkp');
            $this->view('Pembayarankp/index', $data);
            $this->view('templates/footersidebar');
            $this->view('templates/footer');
        }else{
            header("Location:" . BASEURL . "/Beranda");
            exit();
        }
    }
}