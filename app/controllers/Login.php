<?php
session_start();

class Login extends Controller
{
    public function index()
    {
        if (isset($_SESSION['masuk']) && $_SESSION['masuk'] === true) {
            if ($_SESSION['role'] == 'Admin') {
                header("Location:" . BASEURL . "/Beranda");
                exit();
            } else if ($_SESSION['role'] == 'Kepala Lab') {
                header("Location:" . BASEURL . "/Berandakp");
                exit();
            } else {
                header("Location:" . BASEURL . "/Berandamh");
                exit();
            }
        }

        $data['title'] = 'Form Login';

        $this->view('Login/index', $data);
    }

    public function masuk()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // $role = $_POST['role'];
        // var_dump($_POST );

        $data['login'] = $this->model('Login_model')->getUser();
        $user = $this->model('Login_model')->getUserByUsername($username);
        // var_dump($data);
        // Email domain validation
        if (strpos($username, '@umi.ac.id') === false && strpos($username, '@student.umi.ac.id') === false) {
            PesanFlash::setFlash('Email tidak valid', 'Gunakan email dengan domain umi.ac.id atau student.umi.ac.id', 'danger');
            header('Location: ' . BASEURL . '/Login');
            exit;
        }
        $konfirm = "";
        foreach ($data['login'] as $masuk):
            if ($masuk['username'] == $username && $masuk['password'] == $password) {
                $_SESSION['iduser'] = $masuk['iduser'];
                $_SESSION['username'] = $masuk['username'];
                $_SESSION['role'] = $masuk['role'];
                $_SESSION['masuk'] = true;

                if ($user['role'] === 'Mahasiswa') {
                    $_SESSION['stambuk'] = $user['stambuk'];
                }
                $konfirm = true;
            }
        endforeach;
        if ($konfirm == true) {
            if ($_SESSION['role'] == 'Admin') {
                header('Location: ' . BASEURL . '/Beranda');
                exit;
            } else if ($_SESSION['role'] == 'Kepala Lab') {
                header("Location:" . BASEURL . "/Berandakp");
                exit();
            } else {
                header("Location:" . BASEURL . "/Berandamh");
                exit();
            }
        } else {
            // echo "salako";
            PesanFlash::setFlash('Username atau Password', 'Salah', 'danger');
            header('Location: ' . BASEURL . '/Login');
            exit;
        }
    }

    public function keluar()
    {
        // echo 'And di mau keluar';
        session_destroy();
        header('Location: ' . BASEURL . '/Login');
        exit;
    }
}

// session_start();
        // if ($data['login'] === NULL){
        //     stambukCek::setFlash('Username atau', 'Password Salah', 'danger');
        //     header('Location: ' . BASEURL . '/404');
        //     exit;
        // }else{
        //     foreach ($data['login'] as $row):
        //         $_SESSION['user'] = $row['username'];
        //         if($row['role'] === 'Admin'){
        //             header('Location: ' . BASEURL . '/Beranda');
        //             exit;
        //         }else{
        //             header('Location: ' . BASEURL . '/Berandakp');
        //             exit;
        //         }

        //     endforeach;
        // }
