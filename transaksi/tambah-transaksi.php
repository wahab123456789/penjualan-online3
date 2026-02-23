<?php
include ("../koneksi.php");

$query = "SELECT kode_brg, nama_brg, harga FROM barang";
$result = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Transaksi</h1>
    <form action="proses-tambah-transaksi.php" method="post">
        <fieldset>
        <br>
        Kode Transaksi: <input type="text" name="kode_transaksi"><br />
        <br>
        Kode Barang: 
        <select name="kode_brg" id="kode-brg">
            <option value="" disable selected>--pilih kode barang--</option>
            <?php
             while ($barang = mysqli_fetch_array($result)) {
                echo "<option value=".$barang['kode_brg']
                ." data-nama= ".$barang['nama_brg']
                ." data-harga= ".$barang['harga'].">"
                .$barang['kode_brg']." - ".$barang['nama_brg']."</option>";
             }
            ?>

        </select>
        <br />
        <br>
        Nama Barang: <input type="text" name="nama-brg" id="nama-brg" readonly><br />
        <br>  
        Harga Barang: <input type="number" name="harga" id="harga-brg" readonly><br />
        <br>
        Jumlah: <input type="number" name="jumlah"><br />
        <br>
        Total Harga: <input type="number" name="total_bayar" readonly><br />
        <br>
        Tanggal: <input type="date" name="tanggal"><br />
        <br>

        <button type="submit" name="submit">Simpan</button>

        </fieldset>
    </form> 
</body>
</html>

<script>
    document.querySelector('select').addEventListener('change', function() {
      const selected = this.options[this.selectedIndex];
      document.getElementById('nama-brg').value = selected.dataset.nama;
      document.getElementById('harga-brg').value = selected.dataset.harga;
    })

    document.querySelector('input[name="jumlah-brg"]').addEventListener('change', function() {
        const harga = document.getElementById('harga-brg').value;
        const jumlah = this.value;
        const total = harga * jumlah;
        document.querySelector('input[name="tot-hrg"]').value = total;
    })
</script>