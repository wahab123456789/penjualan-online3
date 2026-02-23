<?php 
include("../koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
</head>
<body>
    <h1>Daftar Barang</h1>
    <nav>
        <ul>
            <li><a href="../index.php">Kembali</a></li>
        </ul>
    </nav>
    <nav>
        <ul>
            <li><a href="tambah-barang.php">[+]Tambah Barang</a></li>
        </ul>
    </nav>
    
    <table border="1">
       <thead></thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th> 
                <th>Merk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM barang";
                $query = mysqli_query($db, $sql);

                while ($data = mysqli_fetch_array($query)) {
                    echo "<tr>";

                    echo "<td>" . $data['kode_brg']."</td>";
                    echo "<td>" . $data['nama_brg']."</td>";
                    echo "<td>" . $data['merk']."</td>";
                    echo "<td>" . $data['harga']."</td>";
                    echo "<td>" . $data['jumlah']."</td>";

                    echo "<td>";
                    echo "<a href='edit-barang.php?id=".$data['kode_brg'] . "'>Edit</a> | ";
                    echo "<a href='hapus-barang.php?id=".$data['kode_brg'] . "'onClick='return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'>Hapus</a></td>";
                    echo "</tr>";
                }
            ?>
           
        </tbody>
    </table>
    <P>Total: <?php echo mysqli_num_rows($query) ?> Barang</p>
</body>
</html>