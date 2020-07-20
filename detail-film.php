<?php

include 'koneksi.php';


$query = "SELECT * FROM tabel_nowplaying WHERE id_nowplaying = '".$_GET['id']."'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/style.css">
    <link rel="stylesheet" href="assets/dist-2/css/style.css">
    <title>Document</title>
</head>

<body>

    <section>
        <div class="container">
            <div class="title">
                <h1><?php echo $row["judul"]; ?></h1>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="left-image">
                        <img class="img-fluid" src="assets/images/nowplaying/<?php echo $row['gambar']; ?>" alt="">
                        <h4><?php echo $row['judul']; ?></h4>
                        <p><?php echo $row['genre']; ?></p>
                        <h4><?php echo $row['durasi']; ?></h4>
                    </div>
                </div>
            </div>
            <?php
            $query1 = "SELECT DISTINCT id_theater from tabel_show WHERE id_nowplaying='" . $row['id_nowplaying'] . "'";
            $result1 = mysqli_query($conn, $query1);
            if (mysqli_num_rows($result1)) { ?>
                <table class="table table-hover table-bordered text-center">
                    <?php
                    while ($row1 = mysqli_fetch_array($result1)) {
                        $query2 = "SELECT * FROM tb_theater WHERE id_theater ='" . $row1['id_theater']. "'";
                        $result2 = mysqli_query($conn, $query2);
                        $row2 = mysqli_fetch_array($result2);
                    ?>
                        <tr>
                            <td><?php echo $row2['nama_theater']; ?>
                            </td>
                            <td>
                                <?php
                                $query3 = "SELECT * FROM tabel_show WHERE id_nowplaying='" . $row['id_nowplaying'] . "' AND id_theater = '" . $row1['id_theater'] . "'";
                                $result3 = mysqli_query($conn, $query3);
                                while ($row3 = mysqli_fetch_array($result3)) {
                                    $query4 = "SELECT * FROM tabel_show_time WHERE id_st='" . $row3['id_st'] . "'";
                                    $result4 = mysqli_query($conn, $query4);
                                    $row4 = mysqli_fetch_array($result4);

                                ?>
                                    <a href="check_login.php?show=<?php echo $row3['id_st']; ?>&movie=<?php echo $row3['id_nowplaying'] ?>&theater=<?php echo $row1['id_theater']; ?>">
                                        <button class="btn btn-danger"> <?php echo date('h:i A', strtotime($row4['jam_tayang'])); ?> </button>
                                    </a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            <?php
            } else {
            ?>
                <h3>no show available</h3>
            <?php
            }
            ?>

            </div>

    </section>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>