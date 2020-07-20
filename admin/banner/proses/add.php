<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
    <?php
    include '../../../koneksi.php';

    $durasi = $_POST['durasi'];
    $genre = $_POST['genre'];
    $judul = $_POST['judul'];
    $sinopsis = $_POST['sinopsis'];
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "../../../assets/images/banner/" . $_FILES['gambar']['name']);

    $query = "INSERT INTO tabel_banner VALUES ('','$durasi', '$genre', '$judul', '$sinopsis', '$gambar')";
    mysqli_query($conn, $query);

    header("Location:../index.php");

    ?>
</body>

</html>