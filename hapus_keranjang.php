<?php
session_start();
if (!isset($_SESSION["Login"])){
    header("Location:login.php");
	exit;
}
require 'function.php';

$id = $_GET['id'];
$keranjang = $_SESSION['keranjang'];

// Berfungsi untuk mengambil data lebih spesifik
$sql = array_filter($keranjang,function ($var) use ($id){
    return ($var['id']==$id);
});
foreach ($sql as $key => $value){
    unset($_SESSION['keranjang'][$key]);
}

// Mengembalikan urutan data 
$_SESSION['keranjang'] = array_values($_SESSION['keranjang']);

header('Location:index_kasir.php')





?>