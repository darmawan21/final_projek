<?php
error_reporting(0);
include 'header.php';
if (!isset($_SESSION['userss'])) {
    header('Location:login.php');
}
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
    <link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="booking.css">

    <title>Hello, world!</title>
</head>

<body>
    <?php
    include 'form.php';
    $frm = new formBuilder;
    ?>

    <!-- Content -->
    <div id="content">
        <div class="row">
            <div class="container">
                <div class="col-lg">
                    <h2 class=" judul">Payment</h2>
                </div>
            </div>
        </div>
        <form action="bank.php" method="post" id="form1">
            <div class="container">
                <div class="col-md-4 col-md-offset-4" style="margin-bottom:50px">
                    <div class="form-grup">
                        <label class="control-label">Name on Card</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-grup">
                        <label class="control-label">Card Number</label>
                        <input type="text" class="form-control" name="number" required title="Enter 16 digit card number">
                    </div>
                    <div class="form-grup">
                        <label class="control-label">Expiration date</label>
                        <input type="date" class="form-control" name="date">
                    </div>
                    <div class="form-group">
                        <label class="control-label">CVV</label>
                        <input type="text" class="form-control" name="cvv">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Make Payment</button>
                    </div>
                </div>
        </form>
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

    <!-- session -->
    <?php
    extract($_POST);
    include('config.php');
    $_SESSION['screen'] = $screen;
    $_SESSION['seats'] = $seats;
    $_SESSION['amount'] = $amount;
    $_SESSION['date'] = $date;
    header('Location:bank.php');
    ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="validation/dist/js/bootstrapValidator.js"></script>

    <script>
        $(document).ready(function() {
            $('#form1').bootstrapValidator({
                fields: {
                    name: {
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'The Name is required and can\'t be empty'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z ]+$/,
                                message: 'The Name can only consist of alphabets'
                            }
                        }
                    },
                    number: {
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'The Card Number is required and can\'t be empty'
                            },
                            stringLength: {
                                min: 16,
                                max: 16,
                                message: 'The Card Number must 16 characters long'
                            },
                            regexp: {
                                regexp: /^[0-9 ]+$/,
                                message: 'Enter a valid Card Number'
                            }
                        }
                    },
                    date: {
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'The Expire Date is required and can\'t be empty'
                            }
                        }
                    },
                    cvv: {
                        verbose: false,
                        validators: {
                            notEmpty: {
                                message: 'The cvv is required and can\'t be empty'
                            },
                            stringLength: {
                                min: 3,
                                max: 3,
                                message: 'The cvv must 3 characters long'
                            },
                            regexp: {
                                regexp: /^[0-9 ]+$/,
                                message: 'Enter a valid cvv'
                            }
                        }
                    }
                }
            });
        });
    </script>

</body>

</html>