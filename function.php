<?php
// koneksi
$dbkasir = mysqli_connect("localhost","root","", "rpl_kasir");
function query ($query){
    global $dbkasir;
    $result = mysqli_query($dbkasir,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows [] = $row;
    }
    return $rows;
}

function tambah($tbhbarang){
    global $dbkasir;
    $ID_BARANG = htmlspecialchars($tbhbarang["ID_BARANG"]);
    $NAMA_BARANG = htmlspecialchars($tbhbarang["NAMA_BARANG"]);
    $STOK_BARANG = htmlspecialchars($tbhbarang["STOK_BARANG"]);
    $SATUAN = htmlspecialchars($tbhbarang["SATUAN"]);
    $HARGA_JUAL_BARANG = htmlspecialchars($tbhbarang["HARGA_JUAL_BARANG"]);
    //MEMASUKKAN DATA DALAM QUERY
    $query = "INSERT INTO barang VALUES ('$ID_BARANG','$NAMA_BARANG','$STOK_BARANG','$HARGA_JUAL_BARANG','$SATUAN')";
    mysqli_query ($dbkasir,$query);
    return mysqli_affected_rows($dbkasir);
}
function hapus($idb){
    global $dbkasir;
    mysqli_query($dbkasir,"DELETE FROM barang WHERE ID_BARANG = '$idb'");
    return mysqli_affected_rows($dbkasir);
}

function ubah($ubhbarang){
    global $dbkasir;
    $ID_BARANG = $ubhbarang["ID_BARANG"];
    $STOK_BARANG = htmlspecialchars($ubhbarang["STOK_BARANG"]);
    $HARGA_JUAL_BARANG = htmlspecialchars($ubhbarang["HARGA_JUAL_BARANG"]);

    //MEMASUKKAN DATA DALAM QUERY
    $query = "UPDATE barang SET STOK_BARANG = '$STOK_BARANG',HARGA_JUAL_BARANG = '$HARGA_JUAL_BARANG' WHERE ID_BARANG = '$ID_BARANG'";
    mysqli_query ($dbkasir,$query);
    return mysqli_affected_rows($dbkasir);
}



?>