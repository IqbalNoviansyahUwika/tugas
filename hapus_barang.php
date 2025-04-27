<?php
require "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah barang digunakan di barang_masuk atau barang_keluar
    $cek_masuk = view("SELECT * FROM barang_masuk WHERE barang_id = $id");
    $cek_keluar = view("SELECT * FROM barang_keluar WHERE barang_id = $id");

    if (mysqli_num_rows($cek_masuk) > 0 || mysqli_num_rows($cek_keluar) > 0) {
        echo "<script>alert('Tidak bisa menghapus: Barang masih digunakan di transaksi!'); window.location='stok.php';</script>";
    } else {
        simpan("DELETE FROM barang WHERE id = $id");
        echo "<script>alert('Barang berhasil dihapus!'); window.location='stok.php';</script>";
    }
}
?>