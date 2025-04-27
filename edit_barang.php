<?php
require "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = view("SELECT * FROM barang WHERE id = $id");
    $row = mysqli_fetch_assoc($data);
}

if (isset($_POST['Update'])) {
    $nama = $_POST['txtNama'];
    $kategori = $_POST['txtKategori'];
    $stok = $_POST['txtStok'];
    simpan("UPDATE barang SET nama_barang='$nama', kategori='$kategori', stok=$stok WHERE id=$id");
    echo "<script>alert('Data barang berhasil diupdate!'); window.location='stok.php';</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
</head>

<body>
    <div class="container">
        <a href="stok.php">⬅ Kembali ke Data Stok</a><br><br>

        <h2>Edit Barang</h2>

        <form method="post">
            <label>Nama Barang</label>
            <input type="text" name="txtNama" value="<?php echo $row['nama_barang']; ?>" required>

            <label>Kategori</label>
            <input type="text" name="txtKategori" value="<?php echo $row['kategori']; ?>" required>

            <label>Stok</label>
            <input type="number" name="txtStok" value="<?php echo $row['stok']; ?>" required>

            <br><br>
            <input class="button-primary" type="submit" name="Update" value="Update">
        </form>
    </div>
</body>

</html>