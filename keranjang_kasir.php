<?php
session_start();
if (!isset($_SESSION["Login"])){
    header("Location:login.php");
	exit;
}
require 'function.php';

if(isset($_POST['ID_BARANG'])){
    $ID_BARANG = $_POST['ID_BARANG'];
    $JUMLAH = $_POST['jumlah'];
    $data = mysqli_query($dbkasir,"SELECT * FROM barang WHERE ID_BARANG ='$ID_BARANG'");
    $sql = mysqli_fetch_assoc($data);

    $barang = [
        'id' => $sql['ID_BARANG'],
        'nama' => $sql['NAMA_BARANG'],
        'satuan' => $sql['SATUAN'],
        'harga' => $sql['HARGA_JUAL_BARANG'],
        'jumlah' => $JUMLAH
    ];
    $_SESSION['keranjang'][]=$barang;
    ksort($_SESSION['keranjang']);
    header('Location:index_kasir.php');

}


?>