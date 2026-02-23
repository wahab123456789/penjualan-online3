<?php
include("../koneksi.php");

if (!isset($_GET['id'])) {
    header('Location: data-transaksi.php');
}
$kode = $_GET['id'];

$sql = "SELECT * FROM transaksi WHERE kode_transaksi = '$kode'";
$query = mysqli_query($db, $sql);
$kode_trx = mysqli_fetch_array($query);

$sql2 = "SELECT * FROM barang";
$result = mysqli_query($db, $sql2);


if (mysqli_num_rows($query) < 1) {
    die("Data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
</head>
<body>
    <h1>Edit Transaksi</h1>
    <form action="proses-edit-transaksi.php" method="post">
        <fieldset>
        <br>
        Kode Transaksi: <input type="text" name="kode_transaksi" value="<?php echo $kode_trx['kode_transaksi']; ?>" readonly><br />
        <br>
        Kode Barang:
                <select name="kode_brg" id="kode-brg">
            <?php
             while ($barang = mysqli_fetch_array($result)) {
            $status = ($barang['kode_brg'] == $kode_trx['kode_brg']) ? "selected" : "";
            echo "<option value=".$barang['kode_brg']
                ." data-nama= ".$barang['nama_brg']
                ." data-harga= ".$barang['harga']." ".$status.">"
                .$barang['kode_brg']." - ".$barang['nama_brg']."</option>";
             }
            ?>

        </select>
        <br />
        <br>
        Nama Barang: <input type="text" name="nama-brg" id="nama-brg" value="<?php echo $kode_trx['nama_brg']; ?>" readonly><br />
        <br>  
        Harga Barang: <input type="number" name="harga-brg" id="harga-brg" value="<?php echo $kode_trx['harga']; ?>" readonly><br />
        <br>
        Jumlah: <input type="number" name="jumlah-brg"  value="<?php echo $kode_trx['jumlah']; ?>"><br />
        <br>
        Total Harga: <input type="number" name="tot-hrg"  value="<?php echo $kode_trx['total_bayar']; ?>" readonly><br />
        <br>
        Tanggal: <input type="date" name="tanggal"  value="<?php echo $kode_trx['tanggal']; ?>"><br />
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