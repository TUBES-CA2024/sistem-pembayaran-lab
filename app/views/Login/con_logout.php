<?php

require_once '../app/config/config.php';
// echo $baseurl;die();



if ($baseurl == 'http://localhost/atk-tu/') {
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['login']);
    session_destroy();
    header("Location: http://localhost/atk-tu/Login/");
} else {
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['login']);
    session_destroy();
    header("Location: https://etalase88.com/atk-tu/Login/");
}
