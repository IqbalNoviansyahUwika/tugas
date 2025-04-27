<?php
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "", "warehouse");
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    return $conn;
}

function simpan($sql)
{
    $conn = koneksi();
    $res = mysqli_query($conn, $sql);
    return $res;
}

function view($sql)
{
    $conn = koneksi();
    $res = mysqli_query($conn, $sql);
    return $res;
}
?>