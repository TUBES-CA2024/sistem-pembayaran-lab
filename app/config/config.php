<?php

$url = "https://103.133.36.131";
$url = explode("/", $url);

$baseurl = 'https://' . $url[2] . '/s/SIPEMLA';

define('BASEURL', $baseurl);
// DB
define('DB_HOST', 'localhost');
define('DB_USER', 'sipemla');
define('DB_PASS', 'Sipemla@2025');
define('DB_NAME', 'sipemla');

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
