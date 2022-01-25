<?php
session_start();
require 'koneksi.php';

if ($koneksi) {
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_diamankan = $koneksi->real_escape_string($email);
        $password_diamankan = $koneksi->real_escape_string($password);

        $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE email_admin = '$email_diamankan' AND password_admin = '$password_diamankan'");

        if (mysqli_num_rows($query) > 0) {
            $_SESSION['data'] = mysqli_fetch_array($query);
            header("location: berhasil.php");
        } else {
            echo '<script>alert("Email atau password salah")</script>';
            // header("location: input.php");
        }
    }
} else {
    die('koneksi gagal : ' . mysqli_connect_error());
}
