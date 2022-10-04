<?php
session_start();

if (!isset($_SESSION["Login"])){
	header("Location:login.php");
	exit;
}


require 'function.php';
$JPERHAL=25;
$JumlahData = count(query("SELECT * FROM barang"));
$JumlahHalaman = ceil($JumlahData / $JPERHAL);
$HAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] :1;
$AwalData = ($JPERHAL*$HAktif) - $JPERHAL;


$q_barang = query("SELECT * FROM barang LIMIT $AwalData,$JPERHAL");
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
                <div style="float:left; margin-left:70px;">
                <h1><b>Tabel Stok Barang</b></h1>
                    <p><b>KARYAWAN :</b> <?php echo $_SESSION['NAMA_KARYAWAN']?></p>
                    <a class="btn btn-danger" href ='logout.php'>Log Out</a>
                    <hr style="padding-right:1165px;">
                </div>
                <div class='container'>
                    <div class="row">
                    <p><a class="btn btn-primary" href ='tambah.php'>Tambah Data Barang</a></p>
                    
                    <br>
                    </div>
        <div class="tabelbarang">
            <br>
                <table border ='1' cellpadding='10' cellspacing='0' class="table table-hover">
                <tr>
                    <th>No</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok Barang</th>
                    <th>Satuan</th>
                    <th>Harga Jual Barang</th>
                    <th colspan ="2">Aksi</th>
                </tr>   
                <?php  $i = $AwalData + 1?>
                <?php foreach ($q_barang as $baris):?>
                <tr>
                    <td><?=$i;?></td>
                    <td> <?= $baris["ID_BARANG"];?></td>
                    <td> <?= $baris["NAMA_BARANG"];?></td>
                    <td> <?= $baris["STOK_BARANG"];?></td>
                    <td> <?= $baris["SATUAN"];?></td>
                    <td> <?= $baris["HARGA_JUAL_BARANG"];?></td>
                    <td>
                        <a class="btn btn-success"  href = "ubah.php?ID_BARANG=<?=$baris["ID_BARANG"];?>">Update Stok</a>
                    </td>
                    <td>
                        <a class="btn btn-danger"  href = "hapus.php?ID_BARANG=<?=$baris["ID_BARANG"];?>">Hapus Barang</a>
                    </td>
                </tr>
                <?php $i++;?>
                <?php endforeach;?>
            </table>
            <br>
            <div style="border-radius:10px;"  class="btn btn-primary" >
                <?php for($i = 1; $i <=$JumlahHalaman; $i++) : ?>
                    <?php if($i==$HAktif):?>
                    <a  class="btn btn-success"  href="?halaman=<?=$i;?>"style="font-weight:Bold; Color:Black;"><?=$i;?></a>
                    <?php else:?>
                    <a  class="btn btn-primary" href="?halaman=<?=$i;?>"><?=$i;?></a>
                    <?php endif;?>
                <?php endfor;?>
            </div>
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
