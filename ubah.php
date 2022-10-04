<?php
session_start();

if (!isset($_SESSION["Login"])){
	header("Location:login.php");
	exit;
}
require 'function.php';
$idb = $_GET["ID_BARANG"];

// query data barang
$dbarang = query("SELECT * FROM barang WHERE barang.ID_BARANG ='$idb'")[0];







if(isset($_POST["submit"])){
    if(ubah($_POST) > 0){
        echo"
        <script>
            alert('Data Berhasil Diubah');
            document.location.href = 'index_barang.php'
        </script>
        ";
    } else {
        echo "
         <script>
        alert('Data Gagal Diubah');
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
    <title>Update Data Barang</title>
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
            <h1><b>UPDATE DATA BARANG</b></h1>
            <hr>
            <form action="" method="post">
                <input type="hidden" name="ID_BARANG" value="<?= $dbarang["ID_BARANG"];?>">
                <div class="input-group">
                    <label for="STOK_BARANG">Stok Barang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input class="form-control" type="number" min="1" id="STOK_BARANG" name="STOK_BARANG"required value="<?= $dbarang["STOK_BARANG"];?>">
                </div>
                <br>
                <div class="input-group">
                    <label for="HARGA_JUAL_BARANG">Harga Jual Barang&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input class="form-control" type="number" min="1000" id="HARGA_JUAL_BARANG" name="HARGA_JUAL_BARANG"required value="<?= $dbarang["HARGA_JUAL_BARANG"];?>">
                </div>
                <br>
                    <button  class="btn btn-success" type="submit" name="submit">UPDATE DATA BARANG</button>
                </ul>
            </form>
            <br><br><br><br><br><br><br><br>
        </section>
        
        <section class="footer fixed-bottom">
            <div class="Copyright">
                <p>Copyright &copy; 2022 Kelompok 3 RPL </p>
            </div>
        </section>
</body>
</html>