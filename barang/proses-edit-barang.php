<?php
include("../koneksi.php");

if (isset($_POST['submit'])) {
    $kode = $_POST['kode_brg'];
    $nama = $_POST['nama_brg'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    }

    $sql = "UPDATE barang SET nama_brg='$nama', merk='$merk', harga='$harga', jumlah='$jumlah' where kode_brg='$kode'";

    $query = mysqli_query($db, $sql);

    if ($query) {
        header("Location: data-barang.php");
    } else {
        header("Location: edit-barang.php?id=$kode");
    }

?>