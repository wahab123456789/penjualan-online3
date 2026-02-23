<?php
include("../koneksi.php");

if (isset($_POST['submit'])) {
    $kodetrx = $_POST['kode_transaksi'];
    $kode = $_POST['kode_brg'];
    $nama = $_POST['nama_brg'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total = $_POST['total_bayar'];
    $tanggal = $_POST['tanggal'];
    }

    $sql = "UPDATE transaksi SET kode_brg='$kode', nama_brg='$nama', harga='$harga', jumlah='$jumlah', total_bayar='$total', tanggal='$tanggal' where kode_transaksi='$kodetrx'";

    $query = mysqli_query($db, $sql);

    if ($query) {
        header("Location: data-transaksi.php");
    } else {
        header("Location: edit-transaksi.php?id=$kode");
    }

?>