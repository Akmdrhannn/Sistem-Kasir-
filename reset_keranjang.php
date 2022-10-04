<?php
session_start();
$_SESSION['keranjang'] = [];
header('Location:index_kasir.php');
?>