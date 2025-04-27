<?php
require "koneksi.php";

if (isset($_POST["Submit"])) {
    $nama = $_POST["txtNama"];
    $jumlah = $_POST["txtJumlah"];
    $tanggal = $_POST["txtTanggal"];

    $cek = view("SELECT * FROM barang WHERE nama_barang='$nama'");
    if (mysqli_num_rows($cek) > 0) {
        $row = mysqli_fetch_assoc($cek);
        $id_barang = $row['id'];
        $stok = $row['stok'];

        if ($stok >= $jumlah) {
            simpan("UPDATE barang SET stok = stok - $jumlah WHERE id = $id_barang");
            simpan("INSERT INTO barang_keluar (barang_id, jumlah, tanggal_keluar) VALUES ($id_barang, $jumlah, '$tanggal')");
            echo "<script>alert('Barang keluar disimpan!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Stok tidak cukup!'); window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Barang tidak ditemukan!'); window.location='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Warehouse - Barang Keluar</title>
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/skeleton.css">
</head>
<body>
<div class="container">
<a href="index.php">? Kembali ke Dashboard</a><br><br>

<h2>Input Barang Keluar</h2>
<form method="post" action="">
    <label>Nama Barang</label>
    <input type="text" name="txtNama" required>

    <label>Jumlah</label>
    <input type="number" name="txtJumlah" min="1" required>

    <label>Tanggal Keluar</label>
    <input type="date" name="txtTanggal" required>

    <br><br>
    <input class="button-primary" type="submit" name="Submit" value="Simpan">
    <input class="button" type="reset" value="Reset">
</form>
</div>
</body>
</html>
