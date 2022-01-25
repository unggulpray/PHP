<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <h1 style="text-align: center;">Contoh Mengatasi SQL Injection</h1>
    <form style="margin-left: 5px;" action="mengatasisqlinjection.php" method="POST" enctype="multipart/form-data"><br>
        <label for="">Masukkan Email</label><br>
        <input type="text" placeholder="Email" name="email"><br><br>
        <label for="">Masukkan password</label><br>
        <input type="password" placeholder="Password" name="password"><br><br>
        <button class="btn btn-warning" name="submit">Submit</button>
    </form>
    <br><br>

</body>

</html>