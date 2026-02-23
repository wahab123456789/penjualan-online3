<?php
include("../koneksi.php");

if (isset($_GET['id'])) {
    $kode_brg = $_GET['id'];

    $sql = "DELETE FROM barang WHERE kode_brg='$kode_brg'";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: data-barang.php');
    } else {
        die("Gagal menghapus data.");
    }
} else {
    echo "Kode barang tidak ditemukan.";
}

?>  