<?php 

    // koneksi ke database
    include '../../../koneksi.php';


    // menangkap data yang di kirim dari form   
    $id_banner = $_POST['id_banner'];
    $durasi = $_POST['durasi'];
    $genre = $_POST['genre'];
    $judul = $_POST['judul'];
    $sinopsis = $_POST['sinopsis'];
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../../../assets/images/banner/" . $_FILES['gambar']['name']);

    $query = "UPDATE tabel_banner SET 
                durasi='$durasi',
                genre='$genre', 
                judul='$judul', 
                sinopsis='$sinopsis',
                gambar='$gambar'
                WHERE id_banner='$id_banner'
                ";

    mysqli_query($conn, $query);

    // mengalihkan halaman kembali ke index.php
    header("Location:../index.php");

?>