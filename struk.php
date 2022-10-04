<?php
session_start();
if (!isset($_SESSION["Login"])){
    header("Location:login.php");
    exit;
}

require 'function.php';

$id_trx = $_GET['idtrx'];
$data = mysqli_query($dbkasir, "SELECT * FROM transaksi_penjualan WHERE ID_TRANSAKSI_PENJUALAN='$id_trx'");
$trx = mysqli_fetch_assoc($data);

$detail = mysqli_query($dbkasir, "SELECT detail_transaksi_penjualan.*, barang.NAMA_BARANG,barang.HARGA_JUAL_BARANG FROM `detail_transaksi_penjualan` INNER JOIN barang ON detail_transaksi_penjualan.ID_BARANG=barang.ID_BARANG WHERE detail_transaksi_penjualan.ID_TRANSAKSI_PENJUALAN='$id_trx'");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk pembayaran</title>
    <style type="text/css">
		body{
			color: #a7a7a7;
		}
	</style>
</head>
<body onload="window.print(); self.close();">
	<div align="center">
		<table width="500" border="0" cellpadding="1" cellspacing="0">
			<tr>
				<th>Toko SNT Racaf <br>
					Jl Kemana Saja no 82 A <br>
				Surabaya, Jawa Timur, 60115</th>
			</tr>
            <tr>
				<th>------------------------------------------------------------------------------------------------------------------------</th>
			</tr>
			<tr align="center"><td><hr></td></tr>
			<tr>
				<td>#<?=$trx['TANGGAL_TRANSAKSI_PENJUALAN']?> - <b>KARYAWAN :</b> <?php echo $_SESSION["NAMA_KARYAWAN"]?></td>
			</tr>
            <tr>
				<th>------------------------------------------------------------------------------------------------------------------------</th>
			</tr>
			<tr><td><hr></td></tr>
		</table>
		<table width="500" border="0" cellpadding="3" cellspacing="0">
            <tr>
                <td valign="top">Nama Barang</td>
				<td valign="top" align="center">Jumlah Pembelian</td>
				<td valign="top" align="center">Harga Satuan</td>
				<td valign="top" align="right">Total</td>
            </tr>  
            <tr>
				<td>-----------------------------</td>
				<td>-----------------------------</td>
				<td>-----------------------------</td>
				<td>-----------------------------</td>
			</tr>
            <?php while ($row = mysqli_fetch_array($detail)) { ?>
			<tr>
				<td valign="top">
					<?=$row['NAMA_BARANG']?>
				</td>
				<td valign="top" align="center"><?=$row['JUMLAH_BARANG_PENJUALAN']?></td>
				<td  valign="top" align="center"><?=number_format($row['HARGA_JUAL_BARANG'])?></td>
				<td valign="top" align="right">
					<?=number_format($row['Total Harga Penjualan'])?>
				</td>
			</tr>
			<?php } ?>
            <tr>
				<td colspan="4">-------------------------------------------------------------------------------------------------------------------------</td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td align="right" colspan="3">Total</td>
				<td align="right"><?=number_format($trx['TOTAL'])?></td>
			</tr>
			<tr>
				<td align="right" colspan="3">Bayar</td>
				<td align="right"><?=number_format($trx['PEMBAYARAN'])?></td>
			</tr>
			<tr>
				<td align="right" colspan="3">Kembali</td>
				<td align="right"><?=number_format($trx['KEMBALIAN'])?></td>
			</tr>
		</table>
		<table width="500" border="0" cellpadding="1" cellspacing="0">
			<tr><td><hr></td></tr>
            <tr>
				<th>--------------------------------------------------------------------------------</th>
			</tr>
			<tr>
				<th>Terimakasih</th>
			</tr>
			<tr>
				<th>Selamat Belanja Kembali</th>
			</tr>
            <tr>
                <th>SNT Racaf</th>
            </tr>
		</table>
	</div>
</body>
</html>