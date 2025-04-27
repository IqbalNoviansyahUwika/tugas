<?php
require "koneksi.php";

if (isset($_POST["Submit"])) {
    $nama = $_POST["txtNama"];
    $kategori = $_POST["txtKategori"];
    $jumlah = $_POST["txtJumlah"];
    $tanggal = $_POST["txtTanggal"];

    $cek = view("SELECT * FROM barang WHERE nama_barang='$nama'");

    if (mysqli_num_rows($cek) > 0) {
        $row = mysqli_fetch_assoc($cek);
        $id_barang = $row['id'];
        simpan("UPDATE barang SET stok = stok + $jumlah WHERE id = $id_barang");
    } else {
        simpan("INSERT INTO barang (nama_barang, kategori, stok) VALUES ('$nama', '$kategori', $jumlah)");
        $id_barang = mysqli_insert_id(koneksi());
    }

    $result = simpan("INSERT INTO barang_masuk (barang_id, jumlah, tanggal_masuk) VALUES ($id_barang, $jumlah, '$tanggal')");

    if ($result) {
        echo "<script>alert('Barang masuk disimpan!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data barang masuk!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Warehouse - Barang Masuk</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
</head>

<body>
    <div class="container">
        <a href="index.php">⬅ Kembali ke Dashboard</a><br><br>

        <h2>Input Barang Masuk</h2>

        <form method="post" action="barang_masuk.php">
            <label>Nama Barang</label>
            <input type="text" name="txtNama" required>

            <label>Kategori</label>
            <input type="text" name="txtKategori" required>

            <label>Jumlah</label>
            <input type="number" name="txtJumlah" min="1" required>

            <label>Tanggal Masuk</label>
            <input type="date" name="txtTanggal" required>

            <br><br>
            <input class="button-primary" type="submit" name="Submit" value="Simpan">
            <input class="button" type="reset" value="Reset">
        </form>
    </div>
</body>

</html>