<?php
include("../koneksi.php");

if (isset($_GET['id'])) {
    $kode_brg = $_GET['id'];
    $query = "SELECT * FROM barang WHERE kode_brg = $kode_brg";
    $result = mysqli_query($db, $query);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Barang</h1>
    <form action="proses-edit-barang.php" method="POST">
        <?php
        if(mysqli_num_rows($result) == 1) {
            while ($data = mysqli_fetch_array($result)) {


        ?>
        <fieldset>
        <br>
        Kode Barang: <input type="number" name="kode_brg" value="<?php echo $data['kode_brg']; ?>"><br />
        <br>
        Nama Barang: <input type="text" name="nama_brg" value="<?php echo $data['nama_brg']; ?>"><br />
        <br>
        Merk: <input type="text" name="merk" value="<?php echo $data['merk']; ?>"><br />
        <br>
        Harga Barang: <input type="number" name="harga" value="<?php echo $data['harga']; ?>"><br />
        <br>
        Jumlah Persediaan: <input type="number" name="jumlah" value="<?php echo $data['jumlah']; ?>"><br />
        <br>

        <button type="submit" name="submit">Simpan</button>

        </fieldset>
        <?php
         }
        }
        ?>
    </form> 
</body>
</html>