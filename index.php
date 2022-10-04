<?php
session_start();

if (!isset($_SESSION["Login"])){
	header("Location:login.php");
	exit;
}
require 'function.php';
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
		<title>Sistem Kasir - Home</title>
	</head>
	<body>
		<div class="container">
			<!-- Header -->
			<section class="header">
				<nav class="navbar">
					<img src="images/logo.png" alt="">
					<ul>
						<li><a href="index.php">Homepage</a></li>
						<li><a href="index_barang.php">Stok Barang</a></li>
						<li><a href="index_kasir.php">Kasir</a></li>
						<li><a href="index_pendapatan.php">Pendapatan</a></li>
					</ul>
				</nav>
				<div class="banner">
					<h1>Selamat datang di</h1>
					<h2>Sistem Kasir Toko SNT Racaf</h2>
				</div>
			</section>
			
			<section class="content">
				<div class="content-wrapper">
					<!-- content-main content -->
					<div class="content-group">
						<div class="box">
							<h2>Penjelasan Sistem kasir</h2>
							<p>
								Dalam setiap usaha pastinya sering kita temukan suatu sistem pada kasir baik konvensional 
								maupun digital. Bagi perusahaan dengan aktivitas bisnis besar tentu sangat penting untuk 
								memiliki suatu sistem untuk mengelola setiap transaksi mereka
							</p>
							<p>
								Aplikasi kasir merupakan program dengan fungsi kasir yang berbasis cloud untuk membantu 
								proses transaksi penjualan bisnis. Menggantikan posisi mesin kasir konvensional, fungsi
								 utama dari aplikasi kasir adalah membantu proses pembayaran menjadi terintegrasi.
							</p>
						</div>
					</div>

					<div class="sidebar">
						
					</div>
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
