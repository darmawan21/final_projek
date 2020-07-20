<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="content">
        <h3>movie</h3>
        <?php
        $query = "SELECT * FROM tabel_nowplaying";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) { ?>
            <div class="col">
                <div class="imagerow">
                    <div class="single">
                        <?php ?>
                        <a href="detail-film.php?id=<?php echo $row['id_nowplaying']; ?>"><img src="<?php echo $row['gambar']; ?>" alt="" /></a>
                    </div>
                    <div class="movie-text">
                        <h4 class="h-text"><a href="detail-film.php?id=<?php echo $row['id_nowplaying']; ?>"><?php echo $row['judul']; ?></a></h4>
                        <p><a href="detail-film.php?id=<?php echo $row['id_nowplaying']; ?>">beli tiket</a></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>