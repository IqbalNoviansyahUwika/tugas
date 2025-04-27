<?php
require "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Dapatkan data dulu untuk update stok
    $data = view("SELECT * FROM barang_masuk WHERE id = $id");
    $row = mysqli_fetch_assoc($data);
    $barang_id = $row['barang_id'];
    $jumlah = $row['jumlah'];

    // Kurangi stok karena akan hapus barang masuk
    simpan("UPDATE barang SET stok = stok - $jumlah WHERE id = $barang_id");

    // Hapus data transaksi
    simpan("DELETE FROM barang_masuk WHERE id = $id");

    echo "<script>alert('Transaksi barang masuk dihapus.'); window.location='barang_masuk_list.php';</script>";
}
?>