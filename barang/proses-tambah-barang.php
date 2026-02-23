<?php
include("../koneksi.php");

if(isset($_POST['tambah'])) {
    $kode = $_POST['kode_brg'];
    $nama = $_POST['nama_brg'];
    $merk = $_POST['merk'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    $sql = "INSERT INTO barang (kode_brg, nama_brg, merk, harga, jumlah) VALUES ('$kode', '$nama', '$merk', '$harga', '$jumlah')";
    $query = mysqli_query($db, $sql);

    if($query) {
        header('Location: data-barang.php?status=sukses');
    } else {
        header('Location: tambah-barang.php?id='.$kode);
    }
} else {
    die("Akses dilarang...");
}

?>