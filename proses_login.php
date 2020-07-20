<?php

    session_start();
    require 'function.php';

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    // minghitung jumlah data yang di temukan
    $cek = mysqli_num_rows($result);

    // cek apakah username dan password cocok
    if ($cek ==1 ) {
        
        $data = mysqli_fetch_assoc($result);
        // cek jika user login sebagain admin
        if ($data['level']=="user" && password_verify($password, $data["password"])) {
            
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['level'] = "user";

            $_SESSION['userss'] = $data['id'];
            if (isset($_SESSION['show'])) {
                header('Location:booking.php');
            } else {
                header('Location:index.php');
            }

        } elseif ($data['level']=="admin"&& password_verify($password, $data["password"])) {

            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['level'] = "admin";

            header("Location: admin.php");
        } else {
            header("location:login.php?pesan=gagal");
        }
    } else {
        header("location:login.php?pesan=gagal");
        }
?>