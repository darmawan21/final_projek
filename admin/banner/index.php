<?php

include '../../koneksi.php';

// $query = "SELECT * FROM tabel_admin where id_admin = '$id_admin'";
// $exe = mysqli_query($conn, $query);
// $data = mysqli_fetch_assoc($exe);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Tabel Banner</h1>
    <a href="tambah_banner.php">Tambah konten banner</a>
    <br><br>

    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>durasi</th>
            <th>genre</th>
            <th>Judul</th>
            <th>Sinopsis</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $query = "SELECT * FROM tabel_banner ORDER BY id_banner ASC";
        $exe = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($exe)) { ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row["durasi"] ?></td>
                <td><?php echo $row["genre"] ?></td>
                <td><?php echo $row["judul"] ?></td>
                <td><?php echo $row["sinopsis"] ?></td>
                <td><img src="../../assets/images/banner/<?php echo $row["gambar"]; ?>" width="50"></td>
                <td>
                    <a href="detail_banner.php?id=<?php echo $row['id_banner']; ?>">EDIT</a>
                    <a href="proses/delete.php?id=<?php echo $row['id_banner']; ?>">HAPUS</a>
                </td>
            </tr>
        <?php } ?>

    </table>
</body>

</html>