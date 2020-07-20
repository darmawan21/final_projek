<?php
require 'function.php';
include 'header.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
            alert('user baru berhasil di tambahkan');
        </script>";
    } else {
        echo mysqli_error($conn);
    }
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

    <!-- Bootstrap CSS -->
    <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/registrasi.css">

    <title>Hello, world!</title>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

</head>

<body>



    <!-- log in -->
    <!-- Default form login -->
    <div class="login">
        <div class="container">
            <div class="row popular justify-content-center ">
                <div class="col col-lg-5 popular-all text-center">
                    <div class="batas">
                        <div class="d-flex justify-content-around">
                            <div>
                                <div class="custom-control custom-checkbox ">
                                    <a href="login.php" class="judul">LOGIN</a>
                                </div>
                            </div>
                            <div>
                                <a href="register.php" class="judul">Create Account</a>
                            </div>
                        </div>
                        <hr>
                        <form action="">
                            <div class="form-row mb-4">
                                <div class="col">
                                    <!-- First name -->
                                    <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name">
                                </div>
                                <div class="col">
                                    <!-- Last name -->
                                    <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name">
                                </div>
                            </div>
                            <!-- username -->
                            <input type="username" id="username" name="username" class="form-control mb-4" placeholder="Username">

                            <!-- Email -->
                            <input type="email" id="email" name="email" class="form-control mb-4" placeholder="Email">

                            <!-- Password -->
                            <input type="password" id="password" class="form-control mb-4" placeholder="Password">

                            <!-- repeat password -->
                            <input type="password2" id="password2" class="form-control mb-4" placeholder="Confrim Password">

                            <!-- level -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="level">Level</label>
                                </div>
                                <select class="custom-select" name="level" id="level">
                                    <option selected>Choose...</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>

                            <!-- Sign in button -->
                            <button class="btn btn-danger btn-block my-4 tombol-login" type="submit" name="register">Create Account</button>
                        </form>
                    </div>
                </div>

                <div class="col col-lg-1">
                    <p class="vl"></p>
                </div>

                <div class="col col-lg-5">
                    <img src="asset/popular/video/workingspace.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Default form login -->
    <!-- End Log in -->

    <!-- Footer -->
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