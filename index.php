<?php

include 'header.php';

$slider = "SELECT * FROM tabel_banner ORDER BY id_banner ASC";
$exe1 = mysqli_query($conn, $slider);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/style.css">
    <link rel="stylesheet" href="assets/dist-2/css/style.css">

    <title>Hello, world!</title>
</head>

<body>
    <!-- navbar -->
    <!-- <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="#">Now Playing</a>
                    <a class="nav-item nav-link" href="#">Upcoming</a>
                    <a class="nav-item nav-link" href="movie.php">Theaters</a>
                    <a class="nav-item nav-link" href="#">Promotions</a>
                    <a class="nav-item nav-link" href="#">News & Event</a>
                    <a class="nav-item btn btn-danger" href="#">Login</a>
                </div>
            </div>
        </div>
    </nav> -->
    <!-- end navbar -->

    <!-- carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $no = 0;
            for ($no; $no < 3; $no++) {
            ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $no ?>" class="<?php if ($no == 0) {
                                                                                                            echo 'active';
                                                                                                        } else {
                                                                                                            echo 'notactive';
                                                                                                        } ?>"></li>
            <?php
            }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
            $no = 0;
            while ($row = mysqli_fetch_array($exe1)) {
            ?>
                <div class="carousel-item <?php if ($no == 0) {
                                                echo 'active';
                                            } else {
                                                echo 'notactive';
                                            } ?>">
                    <img class="d-block w-100" alt="..." src="assets/images/banner/<?php echo $row["gambar"]; ?>">
                </div>
            <?php
                $no++;
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- end carousel -->

    <section class="home_gallery_area p_120">
        <div class="container">
            <div class="main-title">
                <h2>Now Playing</h2>
            </div>

            <div class="isotope-filter">
                <ul class="gallery_filter list">
                    <li class="active" data-filter="*"><a href="#">All Movie</a></li>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM tb_kota");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <li data-filter=".<?php echo $data['nama_kota']; ?>"><a href="#"><?php echo $data['nama_kota']; ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="gallery_f_inner row imageGallery1">
                <?php
                $query = mysqli_query($conn, "SELECT n.judul, n.id_nowplaying, n.gambar, k.nama_kota FROM tabel_nowplaying n INNER JOIN tb_kota k ON n.id_kota = k.id_kota ORDER BY n.judul ASC");
                while ($row = mysqli_fetch_array($query)) { ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 <?php echo $row['nama_kota']; ?>">
                        <div class="h_gallery_item">
                            <div class="g_img_item">
                                <img class="img-fluid" src="assets/images/nowplaying/<?php echo $row['gambar']; ?>" alt="">
                                <a class="light" href="assets/images/nowplaying /<?php echo $row['gambar']; ?>"><img src="assets/dist-2/img/gallery/icon.png" alt=""></a>
                            </div>
                            <div class="g_item_text">
                                <h4><?php echo $row['judul']; ?></h4>
                                <p><?php echo $row['nama_kota']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- Navbar Scroll-->
    <script>
        $(window).on('scroll', function() {
            if ($(window).scrollTop()) {
                $('nav').addClass('black');
            } else {
                $('nav').removeClass('black');
            }
        })
    </script>
</body>

</html>