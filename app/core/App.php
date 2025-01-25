<?php

class App
{

    protected $controller = 'Login'; //Digunakan untuk controller default sebagai Login
    protected $method = 'index'; //Digunakan untuk method default sebagai index
    protected $params = []; //Digunakan untuk parameter default sebagai array


    public function __construct() //Digunakan untuk membuat controller, method, dan params
    {

        $url = $this->parseURL(); //Digunakan untuk memanggil method parseURL


        if (empty($url[0])) { //Digunakan untuk mengecek apakah url kosong
            // controller devault
            if (file_exists('login.php')) { //Digunakan untuk mengecek apakah file login.php ada
                $this->controller = $url[0]; //Digunakan untuk mengganti controller default menjadi login
                unset($url[0]); //Digunakan untuk menghapus url[0]
                // var_dump($url);
            }

            require_once 'app/controllers/' . $this->controller . '.php'; //Digunakan untuk memanggil controller
            $this->controller = new $this->controller; //Digunakan untuk membuat controller baru
        } else { //Digunakan untuk mengecek apakah url tidak kosong

            // controller
            if (file_exists('app/controllers/' . $url[0] . '.php')) { //Digunakan untuk mengecek apakah file controller ada
                $this->controller = $url[0]; //Digunakan untuk mengganti controller default menjadi url[0]
                unset($url[0]); //Digunakan untuk menghapus url[0]
                // var_dump($url);
            }

            require_once 'app/controllers/' . $this->controller . '.php'; //Digunakan untuk memanggil controller
            $this->controller = new $this->controller; //Digunakan untuk membuat controller baru

            //method
            if (isset($url[1])) { //Digunakan untuk mengecek apakah url[1] ada
                if (method_exists($this->controller, $url[1])) { //Digunakan untuk mengecek apakah method ada
                    $this->method = $url[1]; //Digunakan untuk mengganti method default menjadi url[1]
                    unset($url[1]); //Digunakan untuk menghapus url[1]
                }
            }
        }

        // params
        if (!empty($url)) { //Digunakan untuk mengecek apakah url tidak kosong
            $this->params = array_values($url); //Digunakan untuk mengganti params menjadi array values dari url
            // var_dump($url);
        }

        // Jalankan controllers dan methot serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params); //Digunakan untuk menjalankan controller, method, dan params
    }

    public function parseURL()
    {

        if (isset($_GET['url'])) {

            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }
}
