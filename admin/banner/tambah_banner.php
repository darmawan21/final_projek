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
    <form action="proses/add.php" method="post">
        <fieldset>
            <legend>form input</legend>
                <p>
                    <label for="durasi">Durasi</label>
                    <input type="text" name="durasi" id="durasi" required>
                </p>
                <p>
                    <label for="genre">Genre</label>
                    <input type="text" name="genre" id="genre" required>
                </p>
                <p>
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" id="judul" required>
                </p>
                <p>
                    <label for="sinopsis">Sinopsis</label>
                    <textarea name="sinopsis" id="sinopsis" cols="30" rows="10"></textarea>
                </p>
                <p>
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" required>
                </p>
            <input type="submit" value="simpan">
        </fieldset>
    </form>
</body>

</html>