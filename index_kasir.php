<?php
session_start();

if (!isset($_SESSION["Login"])){
    header("Location:login.php");
	exit;
}
require 'function.php';
$barang = mysqli_query($dbkasir,"SELECT * FROM barang");

$TOTAL= 0;
if(isset($_SESSION['keranjang'])){
    foreach ($_SESSION['keranjang'] as $key => $value){
        $TOTAL += $value['harga'] * $value['jumlah'];
    }
}else{
    $_SESSION['keranjang'] = [];
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
        <link href='https://css.gg/trash.css' rel='stylesheet'>
		<link rel="stylesheet" href="images/style.css">
        <link rel="stylesheet" href="images/css/bootstrap.css">
		<title>Sistem Kasir - Kasir</title>
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
                <div class= "row" style='margin-left:70px; margin-right:50px;'>
                    <div class="col-md-12">
                        <br>
                        <h1><b>Kasir</b></h1>
                        <p><b>KARYAWAN :</b> <?php echo $_SESSION["NAMA_KARYAWAN"]?></p>
                        <a class="btn btn-danger" href ='logout.php'>Log Out</a>
                        <hr>
                    </div>
                </div>
                
    <div class="row" style="margin-left:70px; margin-right:50px;">
   
        <div class="col-md-12">
            <form action="keranjang_kasir.php" method="post"  class="form-inline">
                <div class="input-group">
                    <select class="form-control" required name="ID_BARANG">
                        <option value="">Pilih Barang</option>
                        <?php while ($row = mysqli_fetch_array($barang)){
                            ?><option value="<?=$row['ID_BARANG']?>"><?=$row['ID_BARANG']?> - <?=$row['NAMA_BARANG']?></option>
                            <?php } ?>
                    </select>
                </div>
                <div class="input-group">
                    <input type="number" required name="jumlah" min="1" class="form-control" placeholder="Jumlah Barang">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">Tambah ke keranjang</button>
                        <a class="btn btn-danger" href="reset_keranjang.php">Reset Keranjang</a>
                    </span>
                </div>
            </form>
            <br>
            <form action="keranjang_update.php" method="post">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub Total</th>
                    <th></th>
                </tr>
                    <?php foreach ($_SESSION['keranjang'] as $key => $value) { ?>
                        <tr>
                        <input type="hidden" value="<?php echo $value['id']?>" name="">
                            <td><?=$value['nama']?></td>
                            <td><?=$value['satuan']?></td>
                            <td><?=number_format($value['harga'])?></td>
                            <td class="col-md-2">
                                <input type="number" required min="1" name="jumlah[]" value="<?=$value['jumlah']?>"class="form-control">
                            </td>
                            <td><?=number_format($value['harga'] * $value['jumlah'])?></td>
                            <td><a href="hapus_keranjang.php?id=<?=$value['id']?>" class="btn btn-danger"><i class="gg-trash"></i></a></td>
                        </tr>
                    <?php } ?>
            </table>
        </div>
    </div>
    <div >
    <button style="float:left; margin-left:90px;" type="submit" class="btn btn-success">Perbarui Keranjang</button>
    <h3 style="float:right;margin-left:50px; margin-right: 95px;">Total Rp. <?=number_format($TOTAL)?></h3>
    </div>
    </form>
    <br>
    <br>
    <div style="margin-left:90px;margin-bottom:90px" class="col-md-4">
        <form action="transaksi_penjualan.php" method="POST">
            <hr>
				<input type="hidden" name="total" value="<?=$TOTAL?>">
			<div class="form-group">
				<label for="bayar">Bayar</label>
				<input required type="number" id="bayar" name="bayar" class="form-control" min="<?=$TOTAL?>">
			</div>
            <br>
			<button type="submit" class="btn btn-primary">Selesai</button>
            <p>&nbsp;</p>
        </form>
    </div>
    </section>
		<!-- footer -->
            <section class="footer fixed-bottom">
            <div class="Copyright">
                <p>Copyright &copy; 2022 Kelompok 3 RPL </p>
            </div>
            </section>
	</body>
</html>
