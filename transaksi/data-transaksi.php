<?php
include("../koneksi.php");

$query = "SELECT * FROM `barang`";

$result = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
</head>
<body>
    <h1>Data Transaksi</h1>
    <nav>
        <ul>
            <li><a href="tambah-transaksi.php">Kembali</a></li>
    </ul>
    <ul>
            <li><a href="tambah-transaksi.php">[+]Tambah Transaksi</a></li>
    </ul>
    </nav>
    <br>

    <table border="1">
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                <th>kode barang</th>
                <th>Nama Barang</th>
                <th>harga</th>
                <th>jumlah</th>
                <th>total bayar</th>
                <th>Tanggal</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
             <?php
                $sql = "SELECT * FROM transaksi";
                $query = mysqli_query($db, $sql);

                while ($transaksi = mysqli_fetch_array($query)) {
                    echo "<tr>";

                    echo "<td>" . $transaksi['kode_transaksi']."</td>";
                    echo "<td>" . $transaksi['kode_brg']."</td>";
                    echo "<td>" . $transaksi['nama_brg']."</td>";
                    echo "<td>" . $transaksi['harga']."</td>";
                    echo "<td>" . $transaksi['jumlah']."</td>";
                    echo "<td>" . $transaksi['total_bayar']."</td>";
                    echo "<td>" . $transaksi['tanggal']."</td>";

                    echo "<td>";
                    echo "<a href='edit-transaksi.php?id=".$transaksi['kode_transaksi'] . "'>Edit</a> | ";
                    echo "<a href='hapus-transaksi.php?id=".$transaksi['kode_transaksi'] . "'onClick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'>Hapus</a></td>";
                    echo "</tr>";
                }
            ?>
           
        </tbody>
    </table>
    <P>Total: <?php echo mysqli_num_rows($query) ?> Barang</p>
</body>
</html>