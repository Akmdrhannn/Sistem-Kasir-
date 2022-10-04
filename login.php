<?php
session_start();

require 'function.php';
// cek submit ditekan
if(isset($_POST["submit"])){
    $NAMA_KARYAWAN = $_POST["NAMA_KARYAWAN"];
    $PASSWORD_KARYAWAN = $_POST["PASSWORD_KARYAWAN"];
    $query_sql = "SELECT * FROM karyawan 
                        WHERE NAMA_KARYAWAN = '$NAMA_KARYAWAN' AND PASSWORD_KARYAWAN = '$PASSWORD_KARYAWAN'";

    $result = mysqli_query($dbkasir, $query_sql);

    if(mysqli_num_rows($result) > 0){
        $rows = mysqli_fetch_assoc($result);
        $_SESSION['Login'] = true;
        $_SESSION['NAMA_KARYAWAN'] = $rows['NAMA_KARYAWAN'];
        $_SESSION['ID_KARYAWAN']=$rows['ID_KARYAWAN'];
        header("Location:index.php");
        exit;
    }else{
        echo "<script>alert('ID ATAU PASSWORD SALAH')</script>";
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="images/style_login.css">
    <title>Login</title>
</head>
<body>
    <div class="login-wrapper">
            <div class="header">
                <h1>Sistem Kasir</h1>
                <h1>SNT Racaf</h1>
                <h2>Selamat datang</h2>
            </div>
        <form action="" method="post" class="form">
            <h2>Login</h2>
            <div class="input-wrapper">
                <input type="text" name="NAMA_KARYAWAN" id="NAMA_KARYAWAN" required>
                <label for="NAMA_KARYAWAN">Nama Karyawan</label>
            </div>
            <div class="input-wrapper">
                <input type="password" name="PASSWORD_KARYAWAN" id="PASSWORD_KARYAWAN" required>
                <label for="PASSWORD_KARYAWAN">Password</label>
            </div>
            <p>Daftar Karyawan Baru:</p>
            <a href="register.php">Register</a> 
            <button type="submit" name="submit" class="login-btn">Login</button>
        </form>
    </div>
</body>
</html>