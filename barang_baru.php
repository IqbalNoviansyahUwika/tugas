<?php
require "koneksi.php";

if (isset($_POST["Submit"])) {
    $nama = $_POST["txtNama"];
    $kategori = $_POST["txtKategori"];
    $stok = $_POST["txtStok"];

    $cek = view("SELECT * FROM barang WHERE nama_barang='$nama'");

    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Barang sudah ada!');</script>";
    } else {
        $result = simpan("INSERT INTO barang (nama_barang, kategori, stok) VALUES ('$nama', '$kategori', $stok)");

        if ($result) {
            echo "<script>alert('Barang berhasil ditambahkan!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan barang!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Warehouse - Input Barang Baru</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
</head>

<body>
    <div class="container">
        <a href="index.php">? Kembali ke Dashboard</a><br><br>

        <h2>Input Barang Baru</h2>

        <form method="post" action="barang_baru.php">
            <label>Nama Barang</label>
            <input type="text" name="txtNama" required>

            <label>Kategori</label>
            <input type="text" name="txtKategori" required>

            <label>Jumlah</label>
            <input type="number" name="txtStok" min="0" required>

            <label>Tanggal Masuk</label>
            <input type="date" name="txtTanggal" required>

            <br><br>
            <input class="button-primary" type="submit" name="Submit" value="Simpan">
            <input class="button" type="reset" value="Reset">
        </form>
    </div>
</body>

</html>