<?php
if(isset($_POST['enkripsi'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    $chippering = "AES-128-CTR";
    $option = 0;
    $enkripsi_iv = "1234567891234567";
    $enkripsi_key = "unggul";

    $enkripsi_id = openssl_encrypt($id, $chippering, $enkripsi_key, $option, $enkripsi_iv);
    $enkripsi_nama = openssl_encrypt($nama, $chippering, $enkripsi_key, $option, $enkripsi_iv);

    echo "ID Plaintext = ".$id."</br>";
    echo "Nama Plaintext = ".$nama."</br>";
    echo "======================================== </br>";
    echo "Chippertext ID = ".$enkripsi_id."</br>";
    echo "Chippertext Nama = ".$enkripsi_nama;
}else{
    $id = $_POST['id'];
    $nama = $_POST['nama'];

    $chippering = "AES-128-CTR";
    $option = 0;
    $dekripsi_iv = "1234567891234567";
    $dekripsi_key = "unggul";

    $dekripsi_id = openssl_decrypt($id, $chippering, $dekripsi_key, $option, $dekripsi_iv);
    $dekripsi_nama = openssl_decrypt($nama, $chippering, $dekripsi_key, $option, $dekripsi_iv);

    echo "ID Plaintext = ".$id."</br>";
    echo "Nama Plaintext = ".$nama."</br>";
    echo "======================================== </br>";
    echo "Chippertext ID = ".$dekripsi_id."</br>";
    echo "Chippertext Nama = ".$dekripsi_nama;
}
?>