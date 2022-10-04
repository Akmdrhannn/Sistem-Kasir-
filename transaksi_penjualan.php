<?php
session_start();
if (!isset($_SESSION["Login"])){
	header("Location:login.php");
	exit;
}

require 'function.php';
date_default_timezone_set("Asia/Jakarta");
$pembayaran = preg_replace('/\D/', '', $_POST['bayar']);
$TANGGAL_TRANSAKSI_PENJUALAN = date('Y-m-d H:i:s');
$total = $_POST['total'];
$idk = $_SESSION['ID_KARYAWAN'];
$kembali = $pembayaran - $total;


//insert ke tabel transaksi_penjualan
mysqli_query($dbkasir, "INSERT INTO transaksi_penjualan VALUES ('','$idk','$TANGGAL_TRANSAKSI_PENJUALAN','$pembayaran','$total','$kembali')");

$idt= mysqli_insert_id($dbkasir);

//insert ke detail transaksi
foreach ($_SESSION['keranjang'] as $key => $value) {
	$id_barang = $value['id'];
    $SB= mysqli_query($dbkasir,"SELECT * FROM barang WHERE ID_BARANG='$id_barang'");
    $stokbar = mysqli_fetch_array($SB);
    $stok = $stokbar['STOK_BARANG'];
    $harga = $value['harga'];
    $qty = $value['jumlah'];
    $sisastok = $stok - $qty;
    $tot = $harga*$qty;


    if ($stok < $qty) {
        echo "<script>alert('STOK TIDAK CUKUP')</script>";
    }
    else{
        $insert=mysqli_query($dbkasir,"INSERT INTO detail_transaksi_penjualan VALUES ('','$id_barang','$idt','$qty','$tot')");
            if($insert){
                //update stok
                $upstok= mysqli_query($dbkasir, "UPDATE barang SET STOK_BARANG ='$sisastok' WHERE ID_BARANG='$id_barang'");
                ?>
                <script language="JavaScript">
                    alert('Good! Input transaksi pengeluaran barang berhasil ...');
                </script>
                <?php
            }
}
}

$_SESSION['keranjang'] = [];

//redirect ke halaman transaksi selesai
header("location:struk.php?idtrx=".$idt);

?>