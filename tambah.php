<?php
session_start();

if (!isset($_SESSION["Login"])){
	header("Location:login.php");
	exit;
}
require 'function.php';
if(isset($_POST["submit"])){
    if(tambah($_POST) > 0){
        echo"
        <script>
            alert('Data Berhasil Ditambah');
            document.location.href = 'index_barang.php'
        </script>
        ";
    } else {
        echo "
         <script>
        alert('Data Gagal Ditambah');
        document.location.href = 'index_barang.php'
         </script>";
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
    <title>Tambah Data Barang</title>
    <link rel="stylesheet" href="images/css/bootstrap.css">
    <link rel="stylesheet" href="images/style.css">
</head>
<body>
    <section class="header-non-homepage">
    <nav class="navbar">
            <img src="images/logo.png" alt="">
            <ul>
                <li><a href="index.php">Homepage</a></li>
                <li><a href="index_barang.php">Stok Barang</a></li>
                <li><a href="index_kasir.php">Kasir</a></li>
                <li><a href="index_pendapatan.php">Pendapatan</a></li>
            </ul>
        </nav>
    </section>
    

    <section class="content p-3">
    <br>
    <h1><b>TAMBAH DATA BARANG</b></h1>
    <br><hr>
    <form action="" method="post">
        <div class="input-group">
            <label for="ID_BARANG">ID Barang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input class="form-control" type="text" id="ID_BARANG" name="ID_BARANG" maxlength="6" required>
        </div>
        <br>
        <div class="input-group">
            <label for="NAMA_BARANG">Nama Barang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input class="form-control" type="text" id="NAMA_BARANG" name="NAMA_BARANG"required>
        </div>
        <br>
        <div class="input-group">
            <label for="STOK_BARANG">Stok Barang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input class="form-control" type="number" id="STOK_BARANG" name="STOK_BARANG" min="1" required>
        </div>
        <br>
        <div class="input-group">
            <label for="SATUAN">Satuan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input class="form-control" type="text" id="SATUAN" name="SATUAN"required>
        </div>
        <br>
        <div class="input-group">
            <label for="HARGA_JUAL_BARANG">Harga Jual Barang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input class="form-control" type="number" id="HARGA_JUAL_BARANG" name="HARGA_JUAL_BARANG" min="1000" required>
        </div>
        <br>
            <button class="btn btn-success" type="submit" name="submit">TAMBAH DATA BARANG</button>
        </ul>
    </form>
    </section>
    

    <section class="footer">
    <div class="Copyright">
                <p>Copyright &copy; 2022 Kelompok 3 RPL </p>
            </div>
        </section>
</body>
</html>