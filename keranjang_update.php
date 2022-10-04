<?php
session_start();

if (!isset($_SESSION["Login"])){
	header("Location:login.php");
	exit;
}
require 'function.php';
$jumlah = $_POST['jumlah'];

foreach ($_SESSION['keranjang'] as $key => $value){
    $_SESSION['keranjang'][$key]['jumlah'] = $jumlah[$key];
}
header('Location:index_kasir.php')
?>