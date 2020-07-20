<?php

include '../../koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Tambah Data banner</h1>
    <?php
    include '../../koneksi.php';
    $id_banner = $_GET['id'];
    $query = "SELECT * FROM tabel_banner where id_banner = '$id_banner'";
    $exe = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($exe)) { ?>
        <form action="proses/update.php" method="post"> 
            <fieldset>
                <legend>form input</legend>
                <p>
                    <label for="durasi">Durasi</label>
                    <input type="text" name="durasi" id="durasi" value="<?php echo $row["durasi"] ?>">
                    <input type="hidden" name="id_banner" value="<?php echo $row['id_banner']; ?>">
                </p>
                <p>
                    <label for="genre">Genre</label>
                    <input type="text" name="genre" id="genre" value="<?php echo $row["genre"]; ?>">
                </p>
                <p>
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" value="<?php echo $row["judul"]; ?>">
                </p>
                <p>
                    <label for="sinopsis">Sinopsis</label>
                    <textarea name="sinopsis" id="sinopsis" cols="30" rows="10"><?php echo $row["sinopsis"]; ?> </textarea>
                </p>
                <p>
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar">
                </p>
                <input type="submit" value="simpan">
            </fieldset>
        </form>
    <?php } ?>
</body>

</html>