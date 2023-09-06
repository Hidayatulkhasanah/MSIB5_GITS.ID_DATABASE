<?php

$host = 'localhost'; //127.0.0.1
$database_name = 'db_perpus';
$database_username = 'root';
$database_password = '';

// Membuat koneksi menuju database
$connect = mysqli_connect($host, $database_username, $database_password, $database_name);

if ($connect){
    echo "connected";
}else {
    echo "not connected";
}
?>