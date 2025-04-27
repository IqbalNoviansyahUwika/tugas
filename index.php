<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Warehouse - Dashboard</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
</head>

<body>

    <div class="container">
        <img src="Logo-Indomarco.png" alt="Logo Indomarco" class="logo">
        <h1>Warehouse Management System</h1>
        <h5>PT Indomarco Prismatama</h5>
        <br>

        <div class="button-group">
            <a class="button-custom button-green" href="stok.php">Daftar Barang</a>
            <a class="button-custom" href="barang_baru.php">Input Barang Baru</a>
            <a class="button-custom button-red" href="barang_keluar.php">Input Barang Keluar</a>

            <a class="button-custom" href="barang_masuk.php">Input Barang Masuk</a>
            <a class="button-custom" href="barang_masuk_list.php">Daftar Barang Masuk</a>
            <a class="button-custom button-red" href="barang_keluar_list.php">Daftar Barang Keluar</a>

        </div>
    </div>
    <div class="container">
        <h7>Dibuat oleh: Agus Purnawan NRP:31123023</h>
    </div>
</body>

<style>
    .container {
        margin-top: 50px;
        text-align: center;
    }

    h1 {
        margin-bottom: 10px;
    }

    h5 {
        margin-bottom: 30px;
    }

    .button-custom {
        display: inline-block;
        margin: 10px;
        padding: 10px 25px;
        font-size: 14px;
        text-decoration: none;
        color: white;
        background-color: #007BFF;
        border-radius: 8px;
        transition: 0.3s;
    }

    .button-custom:hover {
        background-color: #0056b3;
    }

    .button-green {
        background-color: #28a745;
        /* Hijau */
    }

    .button-green:hover {
        background-color: #218838;
        /* Hijau lebih gelap */
    }

    .button-red {
        background-color: #dc3545;
        /* Merah */
    }

    .button-red:hover {
        background-color: #c82333;
        /* Merah lebih gelap */
    }

    img.logo {
        width: 200px;
        height: auto;
        display: block;
        margin: 0 auto 5px;
    }

    .button-group {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        justify-items: center;
        margin-top: 30px;
    }
</style>

</html>