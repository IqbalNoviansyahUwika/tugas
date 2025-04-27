<?php
require "koneksi.php";
$data = view("
    SELECT bk.id, b.nama_barang, bk.jumlah, bk.tanggal_keluar
    FROM barang_keluar bk
    JOIN barang b ON bk.barang_id = b.id
    ORDER BY bk.tanggal_keluar DESC
");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Warehouse - Data Barang Keluar</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
</head>

<body>
    <div class="container">
        <a href="index.php">? Kembali ke Dashboard</a><br><br>

        <h2>Data Barang Keluar</h2>

        <table class="u-full-width">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Keluar</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($data)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['nama_barang'] . "</td>";
                    echo "<td>" . $row['jumlah'] . "</td>";
                    echo "<td>" . $row['tanggal_keluar'] . "</td>";
                    echo "<td><a href='edit_barang_keluar.php?id=" . $row["id"] . "'>Edit</a></td>";
                    echo "</tr>";
                }
                ?>

            </tbody>
        </table>

    </div>
</body>

</html>