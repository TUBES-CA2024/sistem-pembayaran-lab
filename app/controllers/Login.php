<?php
session_start();

class Login extends Controller {
    public function index()
    {
        if (isset($_SESSION['masuk']) && $_SESSION['masuk'] === true) {
            if($_SESSION['role'] == 'Admin') {
                header("Location:" . BASEURL. "/Beranda");
                exit();
            }else{
                header("Location:" . BASEURL. "/Berandakp");
                exit();
            }
        }

        $data['title'] = 'Form Login';

        $this->view('Login/index', $data);
    }

    public function masuk(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        // $role = $_POST['role'];
        // var_dump($_POST );

        $data['login'] = $this->model('Login_model')->getUser();
        
        // var_dump($data);
        $konfirm = "";
        foreach ($data['login'] as $masuk):
            if ($masuk['username'] == $username && $masuk['password'] == $password ){
                $_SESSION['username'] = $masuk['username'];
                $_SESSION['iduser'] = $masuk['iduser'];
                $_SESSION['role'] = $masuk['role'];
                $_SESSION['masuk'] = true;
                $konfirm = true;
            }
        endforeach;
        if ($konfirm == true){
            if($_SESSION['role']== 'Admin'){
                header('Location: ' . BASEURL . '/Beranda');
                exit;
            }else{
                header('Location: ' . BASEURL . '/Berandakp');
                exit;
            }
        }else{
            // echo "salako";
            stambukCek::setFlash('Username atau Password', 'Salah', 'danger');
            header('Location: ' . BASEURL . '/Login');
            exit;
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
    }

    public function keluar(){
        // echo 'And di mau keluar';
        session_destroy();
        header('Location: ' . BASEURL . '/Login');
        exit;
    }
}