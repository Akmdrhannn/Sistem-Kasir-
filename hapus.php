<?php
require 'function.php';
$idb = $_GET["ID_BARANG"];
if(hapus($idb) > 0){
        echo"
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo"
         <script>
        alert('Data Gagal Dihapus');
        document.location.href = 'index.php'
         </script>";
    }

?>