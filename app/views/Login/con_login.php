<?php
ini_set('display_errors', 'On');
error_reporting(error_reporting() & ~E_NOTICE);

session_start();
require_once '../app/init.php';

$email      = $_POST['email'];
$password   = $_POST['password'];

$result = mysqli_query($connect, "SELECT * FROM user WHERE email='$email'");
$hasil  = mysqli_fetch_array($result);
// echo BASEURL;
// die();
if ($hasil['email'] != $email) {

    header("Location: " . BASEURL . "Login/?");
} else if ($hasil['password'] != $password) {

    header("Location: " . BASEURL . "Login/?");
} else {

    $_SESSION['id']     = $hasil['id'];
    $_SESSION['nama']     = $hasil['nama'];

    header("Location: " . BASEURL);
}
