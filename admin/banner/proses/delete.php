<?php 

include '../../../koneksi.php';

// menangkap data id yang di kirim dari url
$id_banner = $_GET['id'];

// menghapus data dari database
$query = "DELETE FROM tabel_banner WHERE id_banner = '$id_banner'";
$exe = mysqli_query($conn, $query);

// mengalihkan halaman kembali ke index.php
header("Location: ../index.php");

?>