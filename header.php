<?php

include 'koneksi.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/header.css">
    <title>Document</title>

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
</head>

<body>

    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand " href="index.php">NETTER.CO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto  ">
                    <a class="nav-item nav-link " href="nowplaying.php">Now Playing</a>
                    <a class="nav-item nav-link " href="upcoming.php">Upcoming</a>
                    <a class="nav-item nav-link" href="movie.php">Theaters</a>
                    <a class="nav-item nav-link" href="#">Promotions</a>
                    <a class="nav-item nav-link" href="#">News & Event</a>
                    <?php if (isset($_SESSION['userss'])) {
                        $query = "SELECT * FROM user WHERE id ='" . $_SESSION['userss'] . "'";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_array($result); ?>
                        <a class="nav-item nav-link" href="profil.php"><?php echo $row['username']; ?></a>

                    <?php } else { ?>
                        <a class="nav-item btn btn-danger tombol" href="login.php">Login</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>