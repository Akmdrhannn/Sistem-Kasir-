<?php


require 'function.php';
// cek submit ditekan
if(isset($_POST["submit"])){
    $ID_KARYAWAN = $_POST['ID_KARYAWAN'];
    $NAMA_KARYAWAN = $_POST["NAMA_KARYAWAN"];
    $PASSWORD_KARYAWAN = $_POST["PASSWORD_KARYAWAN"];
    $sql = "SELECT ID_KARYAWAN FROM karyawan WHERE ID_KARYAWAN = '$ID_KARYAWAN'";
    $query1 = mysqli_query($dbkasir,$sql);

    if(mysqli_num_rows($query1) >0 ){
        echo"
        <script>
            alert('Gagal Register');
            document.location.href = 'login.php'
        </script>
        ";
    }else{
        $sqlinsert ="INSERT INTO karyawan VALUES ('$ID_KARYAWAN','$NAMA_KARYAWAN','$PASSWORD_KARYAWAN')";
        $query = mysqli_query($dbkasir,$sqlinsert);
        echo"
        <script>
            alert('Berhasil Register');
            document.location.href = 'login.php'
        </script>
        ";
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
            <h2>Register</h2>
            <div class="input-wrapper">
                <input type="text" name="ID_KARYAWAN" id="ID_KARYAWAN" maxlength="5" required>
                <label for="NAMA_KARYAWAN">ID Karyawan</label>
            </div>
            <div class="input-wrapper">
                <input type="text" name="NAMA_KARYAWAN" id="NAMA_KARYAWAN" required>
                <label for="NAMA_KARYAWAN">Nama Karyawan</label>
            </div>
            <div class="input-wrapper">
                <input type="password" name="PASSWORD_KARYAWAN" id="PASSWORD_KARYAWAN" required>
                <label for="PASSWORD_KARYAWAN">Password</label>
                <button type="submit" name="submit" class="login-btn">Register</button>
            </div>
        </form>
    </div>
</body>
</html>