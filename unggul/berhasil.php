<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <thead class="table-dark"> 
            <tr>
                <td>No</td>
                <td>Email</td>
                <td>Password</td>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();
            require 'koneksi.php';
            $tampil = mysqli_query($koneksi, "SELECT * FROM  admin");
            $no = 1;
            $row = $_SESSION['data'] ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row['email_admin'] ?></td>
                <td><?= $row['password_admin'] ?></td>
            </tr>


        </tbody>
    </table>
</body>

</html>