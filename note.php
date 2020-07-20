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
            <?php
            $query1 = "SELECT DISTINCT id_theater from tabel_show WHERE id_nowplaying='" . $row['id_nowplaying'] . "'";
            $result1 = mysqli_query($conn, $query1);
            if (mysqli_fetch_array($result1)) { ?>
                <div class="col-md=-6">
                    <?php
                    while ($row1 = mysqli_fetch_array($result1)) {
                        $query2 = "SELECT * FROM tabel_theater WHERE id_theater ='" . $row1['id_theater'] . "'";
                        $result2 = mysqli_query($conn, $query2);
                        $row2 = mysqli_fetch_array($result2);
                    ?>
                        <div class="clas">
                            <h1><?php echo $row2['nama_theater'] ?></h1>
                            <br>
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
                                        <button class="btn btn-default"> <?php echo date('h:i A', strtotime($row4['jam_tayang'])); ?> </button>
                                    </a>
                                <?php
                                }
                                ?>
                            </td>
                        <?php
                    }
                        ?>
                        </div>
                    <?php
                } else {
                    ?>
                        <h3>no show available</h3>
                    <?php
                }
                    ?>
                </div>
        </div>
    </div>

</section>