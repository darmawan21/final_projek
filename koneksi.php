<?php 

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_percobaan';

$conn = mysqli_connect($host, $username, $password, $database);

// check connection
if (mysqli_connect_errno()) {
    echo "koneksi database gagal: ". mysqli_connect_error();
}

?>