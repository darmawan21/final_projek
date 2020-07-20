<?php

include 'header.php';
if (!isset($_SESSION['userss'])) {
    header('Location:login.php');
}

$query = "SELECT * FROM tabel_nowplaying WHERE id_nowplaying= '" . $_SESSION['movie'] . "'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/booking.css">

    <title>Hello, world!</title>
</head>

<body>

    <!-- Content -->
    <div id="content">

        <div class="container">
            <div class="card text-white bg-secondary">


                <div class="card-header text-center">
                    <p>
                        <?php echo $row['judul']; ?>
                    </p>
                </div>

            </div>
            <table class="table table-dark">
                <?php
                $query1 = "SELECT*FROM tabel_show WHERE id_show='" . $_SESSION['show'] . "'";
                $result1 = mysqli_query($conn, $query1);
                $row1 = mysqli_fetch_array($result1);

                $query2 = "SELECT * FROM tb_theater WHERE id_theater='" . $row1['id_theater'] . "'";
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_array($result2);
                ?>
                <tbody>
                    <tr>
                        <td>theater</td>
                        <td><?php echo $row2['nama_theater'] ?></td>

                    <tr>
                        <td>Screen</td>
                        <td>
                            <?php
                            $query3 = "SELECT * FROM tabel_show_time WHERE id_st='" . $row1['id_st'] . "'";
                            $result3 = mysqli_query($conn, $query3);
                            $row3 = mysqli_fetch_array($result3);

                            $query4 = "SELECT * FROM tabel_screens WHERE id_screens='" . $row3['id_screens'] . "'";
                            $result4 = mysqli_query($conn, $query4);
                            $row4 = mysqli_fetch_array($result4);

                            echo $row4['nama_screens'];
                            ?>
                        </td>

                    </tr>
                    <tr>

                        <td>DATE</td>
                        <td>
                            <?php
                            if (isset($_GET['date'])) {
                                $date = $_GET['date'];
                            } else {
                                if ($row1['tanggal_tayang'] > date('Y-m-d')) {
                                    $date = date('Y-m-d', strtotime($row1['tanggal_tayang'] . "-1 days"));
                                } else {
                                    $date = date('Y-m-d');
                                }
                                $_SESSION['dd'] = $date;
                            }
                            ?>
                            <div class="col-md-12 text-center " style="padding-bottom:20px;">
                                <?php if ($date > $_SESSION['dd']) { ?><a href="booking.php?date=<?php echo date('Y-m-d', strtotime($date . "-1 days")); ?>"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i></button></a> <?php } ?><span style="cursor:default" class="btn btn-default"><?php echo date('d-M-Y', strtotime($date)); ?></span>
                                <?php if ($date != date('Y-m-d', strtotime($_SESSION['dd'] . "+4 days"))) { ?>
                                    <a href="booking.php?date=<?php echo date('Y-m-d', strtotime($date . "+1 days")); ?>"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-right"></i></button></a>
                                <?php }
                                $av = mysqli_query($conn, "select sum(no_seats) from tabel_bookings where id_show='" . $_SESSION['show'] . "' and ticket_date='$date'");
                                $avl = mysqli_fetch_array($av);
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>show time</td>
                        <td>
                            <?php echo date('h:i A', strtotime($row3['jam_tayang'])); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Number of Seats</td>
                        <td>
                            <form action="process_booking.php" method="post">
                                <input type="hidden" name="screen" value="<?php echo $row4['id_screens']; ?>" />
                                <input type="number" required tile="Number of Seats" max="<?php echo $row4['seats'] - $avl[0]; ?>" min="0" name="seats" class="form-control" value="1" style="text-align:center" id="seats" />
                                <input type="hidden" name="amount" id="hm" value="<?php echo $row4['charge']; ?>" />
                                <input type="hidden" name="date" value="<?php echo $date; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td id="amount" style="font-weight:bold;font-size:18px">
                            Rp <?php echo $row4['charge']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><?php if ($avl[0] == $row4['seats']) { ?><button type="button" class="btn btn-danger" style="width:100%">House Full</button><?php } else { ?>
                                <button class="btn btn-info" style="width:100%">Book Now</button>
                            <?php } ?>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
    <!-- End Content -->

    <!-- update -->
    <div class="update-date">
        <div class="container">
            <div class="card bg-secondary">
                <div class="card-body update">
                    <p>Last Update :</p>
                    <p>Senin,</p>
                    <p>Jadwal Tayang Dapat Berubah Sewaktu-Waktu Tanpa Pemberitahuan Terlebih Dahulu. (All Schedules Are Subject To Change Without Notice.)
                        Silahkan Pilih Kota Pada Menu Drop Down Untuk Melihat 21 Theater. Klik Pada Nama Theater Untuk Melihat Film Yang Sedang Diputar Pada Theater Tersebut.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end update -->

    <!-- Footer -->
    <footer class="page-footer font-small indigo">

        <!-- Footer Links -->
        <div class="container">


            <!-- Grid row-->
            <div class="">
                <h1 class="footer-title">NETTER.CO</h1>
            </div>


            <!-- Grid row-->
            <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

                <!-- Grid column -->
                <div class="col-md-6 col-12 mt-5">
                    <p class="footer-caption">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                        eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
                </div>
                <!-- Grid column -->

            </div>


            <!-- Grid row-->
            <div class="footer-link row text-center d-flex justify-content-center pt-5 mb-3">

                <!-- Grid column -->
                <div class="col-md-2 mb-3">
                    <h6 class=" font-weight-bold">
                        <a class="footer-color" href="#!">Contact Us</a>
                    </h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 mb-3">
                    <h6 class=" font-weight-bold">
                        <a class="footer-color" href="#!">Privacy Policy</a>
                    </h6>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 mb-3">
                    <h6 class=" font-weight-bold">
                        <a class="footer-color" href="#!">Terms of Usage</a>
                    </h6>
                </div>
                <!-- Grid column -->

            </div>

            <!-- Grid row-->
            <hr class="footer-line rgba-white-light" style="margin-top: -10px; color:white;">

            <!-- Grid row-->
            <hr class="clearfix d-md-none rgba-white-light" style="margin-top: -20px;">

            <!-- Grid row-->
            <div class="row pb-3 footer-sosmed">

                <!-- Grid column -->
                <div class="col-md-12">

                    <div class="col text-center">

                        <!-- Facebook -->
                        <a class="fb-ic">
                            <i class="fa fa-facebook-f fa-lg white-text mr-3"> </i>
                        </a>
                        <!-- Twitter -->
                        <a class="tw-ic">
                            <i class="fa fa-twitter fa-lg white-text mr-1"> </i>
                        </a>
                        <!--Linkedin -->
                        <a class="li-ic">
                            <i class="fa fa-linkedin-in fa-lg white-text mr-1"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic">
                            <i class="fa fa-instagram fa-lg white-text mr-3"> </i>
                        </a>
                        <!--Pinterest-->
                        <a class="pin-ic">
                            <i class="fa fa-pinterest fa-lg white-text"> </i>
                        </a>

                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row-->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://darmawan21.github.io/netter.github.io/"> Netter.co</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    <!-- End Footer -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
</body>

</html>