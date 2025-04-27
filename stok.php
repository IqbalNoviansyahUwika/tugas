<?php
require "koneksi.php";
$data = view("SELECT * FROM barang");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Warehouse - Stok Barang</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
</head>

<body>
    <div class="container">
        <a href="index.php">⬅ Kembali ke Dashboard</a><br><br>

        <h2>Data Stok Barang</h2>

        <table class="u-full-width">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($data)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['nama_barang'] . "</td>";
                    echo "<td>" . $row['kategori'] . "</td>";
                    echo "<td>" . $row['stok'] . "</td>";
                    echo "<td>
    <a href='edit_barang.php?id=" . $row['id'] . "'>Edit</a> | 
    <a href='hapus_barang.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin mau hapus?\")'>Hapus</a>
    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>