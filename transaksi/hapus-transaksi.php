<?php
include("../koneksi.php");

if (isset($_GET['id'])) {
    $kode_trx = $_GET['id'];

    $sql = "DELETE FROM transaksi WHERE kode_transaksi='$kode_trx'";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: data-transaksi.php');
    } else {
        die("Gagal menghapus data.");
    }
} else {
    echo "Kode barang tidak ditemukan.";
}

?>  