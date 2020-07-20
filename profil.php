<?php

include 'header.php';
if (!isset($_SESSION['userss'])) {
    header('location:login.php');
}
$qry2 = mysqli_query($conn, "select * from tabel_nowplaying where id_nowplaying='" . $_SESSION['movie'] . "'");
$movie = mysqli_fetch_array($qry2);
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
    <link rel="stylesheet" href="profil.css">

    <title>Hello, world!</title>
</head>

<body>
    <!-- navbar -->

    <!-- end navbar -->

    <!-- Content -->
    <div id="content">
        <div class="row">
            <div class="container">
                <div class="col-lg">
                    <h2 class=" judul">Profil</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-header bg-secondary ntb">
                    Account
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link ntb" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    booking
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <?php
                                $bk = mysqli_query($conn, "select * from tabel_bookings where id='" . $_SESSION['userss'] . "'");
                                if (mysqli_num_rows($bk)) { ?>
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col">Booking Id</th>
                                                <th scope="col">Movie</th>
                                                <th scope="col">Theatre</th>
                                                <th scope="col">Screen</th>
                                                <th scope="col">Show</th>
                                                <th scope="col">Seats</th>
                                                <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($bkg = mysqli_fetch_array($bk)) {
                                                $m = mysqli_query($conn, "select * from tabel_nowplaying where id_nowplaying=(select id_nowplaying from tabel_show where id_show='" . $bkg['id_show'] . "')");
                                                $mov = mysqli_fetch_array($m);
                                                $s = mysqli_query($conn, "select * from tabel_screens where id_screens='" . $bkg['id_screens'] . "'");
                                                $srn = mysqli_fetch_array($s);
                                                $tt = mysqli_query($conn, "select * from tb_theater where id_theater='" . $bkg['id_theater'] . "'");
                                                $thr = mysqli_fetch_array($tt);
                                                $st = mysqli_query($conn, "select * from tabel_show_time where id_st=(select id_st from tabel_show where id_show='" . $bkg['id_show'] . "')");
                                                $stm = mysqli_fetch_array($st);
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $bkg['id_ticket']; ?>

                                                    </td>
                                                    <td>
                                                        <?php echo $mov['judul']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $thr['nama_theater']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $srn['nama_screens']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $stm['nama_show_time']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $bkg['no_seats']; ?>
                                                    </td>
                                                    <td>
                                                        Rs <?php echo $bkg['amount']; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($bkg['ticket_date'] < date('Y-m-d')) {
                                                        ?>
                                                            <i class="glyphicon glyphicon-ok"></i>
                                                        <?php
                                                        } else { ?>
                                                            <a href="cancel.php?id=<?php echo $bkg['id_booking']; ?>">Cancel</a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                <?php
                                } else {
                                ?>
                                    <h3>No Previous Bookings</h3>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed ntb" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Update Profile
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="row justify-content-center">
                                            <div class="col-3">
                                                <label for="" class="text-content">Username</label>
                                            </div>
                                            <div class="col-7">
                                                <input type="username" id="defaultLoginFormEmail" class="form-control mb-4 text-light" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-3">
                                                <label for="" class="text-content">Email</label>
                                            </div>
                                            <div class="col-7">
                                                <input type="text" id="defaultLoginFormEmail" class="form-control mb-4 text-light" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-3">
                                                <label for="" class="text-content">City / Town</label>
                                            </div>
                                            <div class="col-7">
                                                <input type="city" id="defaultLoginFormEmail" class="form-control mb-4 text-light" placeholder="City or Town">
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-4">
                                                <label for="" class="text-content">Select a Country</label>
                                            </div>
                                            <div class="col-6">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Select a Country
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        <button class="dropdown-item" type="button">Action</button>
                                                        <button class="dropdown-item" type="button">Another action</button>
                                                        <button class="dropdown-item" type="button">Something else here</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row d-flex justify-content-end">
                                            <div class="col-3">
                                                <button class="btn btn-danger ntb-sub" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-5">
                                        <div class="small-12 medium-2 large-2 columns">
                                            <div class="circle">
                                                <!-- User Profile Image -->
                                                <img class="profile-pic" src="http://cdn.cutestpaw.com/wp-content/uploads/2012/07/l-Wittle-puppy-yawning.jpg">

                                                <!-- Default Image -->
                                                <!-- <i class="fa fa-user fa-5x"></i> -->
                                            </div>
                                            <div class="p-image">
                                                <i class="fa fa-camera upload-button"></i>
                                                <input class="file-upload" type="file" accept="image/*" />
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed ntb" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Logout
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <a href="logout.php">keluar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
    <!-- End Content -->

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

    <script>
        $(document).ready(function() {


            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function() {
                readURL(this);
            });

            $(".upload-button").on('click', function() {
                $(".file-upload").click();
            });
        });

        $('#seats').change(function() {
            var charge = <?php echo $screen['charge']; ?>;
            amount = charge * $(this).val();
            $('#amount').html("Rs " + amount);
            $('#hm').val(amount);
        });
    </script>

</body>

</html>