<?php
session_start();

if (!isset($_SESSION["Login"])){
	header("Location:login.php");
	exit;
}
require 'function.php';

if(isset($_POST['submit'])){
    $awal=$_POST['awal'];
    $akhir=$_POST['akhir'];
    $pendapatan = "SELECT DATE_FORMAT(TANGGAL_TRANSAKSI_PENJUALAN,'%Y - %m') AS Bulan,FORMAT(sum(TOTAL),0) AS Pendapatan  FROM transaksi_penjualan WHERE DATE_FORMAT(TANGGAL_TRANSAKSI_PENJUALAN,'%Y') = $awal AND DATE_FORMAT(TANGGAL_TRANSAKSI_PENJUALAN,'%m') = $akhir GROUP BY DATE_FORMAT(TANGGAL_TRANSAKSI_PENJUALAN,'%Y %m')";
    $query = mysqli_query($dbkasir,$pendapatan);
}else{
    $query = [];
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
		<link rel="stylesheet" href="images/style.css">
		<link rel="stylesheet" href="images/css/bootstrap.css">
		<title>Sistem Kasir - Stok Barang</title>
		<style>
        th{
            text-align:center;
        }
        td{
            text-align:center;
        }
    </style>
	</head>
	<body>
			<!-- Header -->
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
			
			<section class="content">
		    <div class='container'>
				<hr><br>
        			<h1><b>Pendapatan</b></h1>
        			<div class="sticky">
        			<p><b>KARYAWAN :</b> <?php echo $_SESSION['NAMA_KARYAWAN']?></p>
        			<a class="btn btn-danger" href ='logout.php'>Log Out</a>
        			<hr>
                    <form action="" method="post">
                        <label for="awal">Tahun &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <Input type="number" name="awal" min="2022" required>
                        </input>
                        <label for="akhir">Bulan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <Input type="number" min="1" max="12" name="akhir" required>
                        </input>
                        <button class="btn btn-success" type="submit" name="submit">Tampilkan Pendapatan</button> 
                    </form>
					<br><br><br>
		    </div>
			<div>
				<table class="table">
					<tr>
						<th>Tahun - Bulan</th>
						<th>Hasil pendapatan bersih</th>
					</tr>
					<?php foreach($query as $pdptn):?>
					<tr>
						<td><?php echo $pdptn['Bulan']?></td>
						<td>Rp . <?php echo $pdptn['Pendapatan']?> </td>
					</tr>
					<?php endforeach;?>
				</table>
			</div>
			</section>
			
			<!-- footer -->
			<section class="footer fixed-bottom">
			<div class="Copyright">
                <p>Copyright &copy; 2022 Kelompok 3 RPL </p>
            </div>
			</section>
		</div>
		
	</body>
</html>
