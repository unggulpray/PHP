<?php
$host = "localhost";
$username = "root";
$pass = "";
$DB = "mahasiswa";

$koneksi = mysqli_connect($host, $username, $pass, $DB);

$sql = "SELECT * FROM tabel_mahasiswa";
$hasil = $koneksi->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1>Aplikasi CRUD</h1>
    <?php
    function view_data($hasil)
    {
    ?>
    <table class="table" border='1px'>
        <tr class="table-dark">
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Opsi</th>
        </tr>
        <?php while ($data = mysqli_fetch_array($hasil)) { ?>
        <tr>
            <td><?php echo $data['nim']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['jenis_kelamin']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td>
                <a
                    href="crud.php?action=update&nim=<?php echo $data['nim']; ?>&nama=<?php echo $data['nama']; ?>&jenis_kelamin=<?php echo $data['jenis_kelamin']; ?>&alamat=<?php echo $data['alamat']; ?>">Update</a>
                |
                <a href="crud.php?action=delete&nim=<?php echo $data['nim']; ?>">Hapus</a>
            </td>
            <?php }
        } ?>
        </tr>
    </table>

    <?php
        function create_data($koneksi)
        {
            if (isset($_POST['btn_simpan'])) {
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $alamat = $_POST['alamat'];

                if (!empty($nim) && !empty($nama) && !empty($jenis_kelamin) && !empty($alamat)) {
                    $sql = "INSERT INTO tabel_mahasiswa (nim,nama, jenis_kelamin, alamat) VALUES('" . $nim . "','" . $nama . "','" . $jenis_kelamin . "','" . $alamat . "')";
                    $simpan = $koneksi->query($sql);
                    if ($simpan && isset($_GET['action'])) {
                        if ($_GET['action'] == 'create') {
                            header('location: crud.php');
                        }
                    }
                }
            }
        ?>

    <form action="" method="POST">
        Masukkan NIM : <input type="text" name="nim" required><br>
        Masukkan Nama : <input type="text" name="nama" required><br>
        <label for="">Jenis Kelamin </label><br>
        <input type="radio" name="jenis_kelamin" value="Laki-laki" /> Laki-laki<br />
        <input type="radio" name="jenis_kelamin" value="Perempuan" /> Perempuan<br />
        <label for="">Masukkan Alamat</label><br>
        <textarea name="alamat" cols="30" rows="10"></textarea><br>
        <button type="reset" name="btn_reset" class="btn btn-danger">Reset</button>
        <button type="submit" name="btn_simpan" class="btn btn-danger" style="margin-left: 1%;">Simpan</button><br>
    </form>
    <br>
    <?php } ?>

    <?php
        function update_data($koneksi)
        {
            if (isset($_POST['t'])) {
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $alamat = $_POST['alamat'];
                $perubahan = "nama='" . $nama . "',jenis_kelamin='" . $jenis_kelamin . "',alamat='" . $alamat . "'";
                $sql_update = "UPDATE tabel_mahasiswa SET " . $perubahan . " WHERE nim=" . $nim;
                $update = $koneksi->query($sql_update);
                if ($update && $_GET['action']) {
                    if ($_GET['action'] == 'update') {
                        header('location: crud.php');
                    }
                }
            }

        ?>


    <form action="" method="POST">
        <input type="text" name="nim" value="<?php echo $_GET['nim'] ?>"><br>
        Masukkan Nama : <input type="text" name="nama" value="<?php echo $_GET['nama'] ?>"><br>
        <label for="">Jenis Kelamin </label><br>
        <?php
                if ($_GET['jenis_kelamin'] == "Laki-laki") {
                    echo "<input type='radio' name='jenis_kelamin' value='Laki-laki' checked='checked'> Laki-laki";
                    echo "<br>";
                    echo "<input type='radio' name='jenis_kelamin' value='Perempuan'> Perempuan";
                } else {
                    echo "<input type='radio' name='jenis_kelamin' value='Laki-laki'> Laki-laki";
                    echo "<br>";
                    echo "<input type='radio' name='jenis_kelamin' value='Perempuan' checked='checked'> Perempuan";
                }

                ?>
        <br>
        <label for="">Masukkan Alamat</label><br>
        <textarea name="alamat" cols="30" rows="10"><?php echo $_GET['alamat'] ?></textarea><br>
        <button type="reset" name="btn_reset" class="btn btn-danger">Reset</button>
        <button type="submit" name="t" class="btn btn-danger" style="margin-left: 1%;">Update</button><br>
    </form>
    <br>
    <?php
        }
        ?>

    <?php
        function delete($koneksi)
        {

            if (isset($_GET['nim']) && isset($_GET['action'])) {
                $nim = $_GET['nim'];
                $del_sql = "DELETE FROM tabel_mahasiswa WHERE nim=" . $nim;
                $delete = $koneksi->query($del_sql);

                if ($delete) {
                    if ($_GET['action'] == 'delete') {
                        header('location: crud.php');
                    }
                }
            }
        }
        ?>

    <?php

        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case "create":
                    create_data($koneksi);
                    view_data($hasil);
                    break;
                case "read":
                    view_data($hasil);
                    break;
                case "update":
                    update_data($koneksi);
                    view_data($hasil);
                    break;
                case "delete":
                    delete($koneksi);
                    break;
                default:
                    view_data($hasil);
            }
        } else { ?>
    <a href="crud.php?action=create">Tambah Data</a><br>
    <?php view_data($hasil);
        } ?>

</body>

</html>