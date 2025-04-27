<?php
require "koneksi.php";

// Ambil data berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = view("SELECT bk.*, b.nama_barang 
                  FROM barang_keluar bk 
                  JOIN barang b ON bk.barang_id = b.id 
                  WHERE bk.id = $id");
    $row = mysqli_fetch_assoc($data);
    $barang_id = $row['barang_id'];
    $nama_barang = $row['nama_barang'];
    $jumlah_lama = $row['jumlah'];
    $tanggal = $row['tanggal_keluar'];
}

// Saat form disubmit
if (isset($_POST['Update'])) {
    $id = $_POST['id'];
    $barang_id = $_POST['barang_id'];
    $jumlah_baru = $_POST['jumlah'];
    $tanggal_baru = $_POST['tanggal'];

    // Ambil jumlah lama dari transaksi sebelumnya
    $cek = view("SELECT jumlah FROM barang_keluar WHERE id = $id");
    $lama = mysqli_fetch_assoc($cek)['jumlah'];

    // Hitung selisih stok
    $selisih = $jumlah_baru - $lama;

    // Update stok barang (stok dikurangi selisih baru)
    simpan("UPDATE barang SET stok = stok - $selisih WHERE id = $barang_id");

    // Update transaksi
    simpan("UPDATE barang_keluar 
            SET jumlah = $jumlah_baru, tanggal_keluar = '$tanggal_baru' 
            WHERE id = $id");

    echo "<script>alert('Data barang keluar berhasil diupdate!');
    window.location='barang_keluar_list.php';</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Edit Barang Keluar</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
</head>

<body>
    <div class="container">
        <a href="barang_keluar_list.php">⬅ Kembali ke Daftar Barang Keluar</a><br><br>

        <h2>Edit Barang Keluar</h2>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="barang_id" value="<?php echo $barang_id; ?>">

            <label>Nama Barang</label>
            <input type="text" value="<?php echo $nama_barang; ?>" readonly>

            <label>Jumlah</label>
            <input type="number" name="jumlah" value="<?php echo $jumlah_lama; ?>" min="1" required>

            <label>Tanggal Keluar</label>
            <input type="date" name="tanggal" value="<?php echo $tanggal; ?>" required>

            <br><br>
            <input class="button-primary" type="submit" name="Update" value="Update">
        </form>
    </div>
</body>

</html>