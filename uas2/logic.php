<?php
    $localhost = "localhost";
    $username = "root";
    $password = "";
    $db = "uts";

    $koneksi = mysqli_connect($localhost, $username, $password, $db);

    $nama = $_GET['nm'];
    $pw = $_GET['pw'];

    $nama = $koneksi->real_escape_string[$nama];
    $pw = $koneksi->real_escape_string[$pw];

    $sql = mysqli_query($koneksi, "SELECT * FROM login WHERE username='{$nama}' AND password='{$pw}'");

    if(mysqli_num_rows($sql) == 0){
        die("username atau password salah"); 
    }else{
        $_SESSION['logic'] = 1;
        header("location: berhasil.php");
    }
?>