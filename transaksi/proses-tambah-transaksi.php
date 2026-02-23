<?php
include("../koneksi.php");

if(isset($_POST['submit'])) {
    $kodetrx = $_POST['kode_transaksi'];
    $kode = $_POST['kode_brg'];
    $nama = $_POST['nama-brg'];
    $harga = $_POST['harga-brg'];
    $jumlah = $_POST['jumlah-brg'];
    $total = $_POST['total_bayar'];
    $tanggal = $_POST['tanggal'];

    $sql = "INSERT INTO transaksi (kode_transaksi, kode_brg, nama_brg, harga, jumlah, total_bayar, tanggal) VALUES ('$kodetrx', '$kode', '$nama', '$harga', '$jumlah', '$total', '$tanggal')";
    $query = mysqli_query($db, $sql);

    if($query) {
        header('Location: data-transaksi.php?status=sukses');
    } else {
        header('Location: tambah-transaksi.php?id='.$kode);
    }
} else {
    die("Akses dilarang...");
}

?>