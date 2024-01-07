<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_obat = $_POST['nama_obat'];
    $kemasan = $_POST['kemasan'];
    $harga = $_POST['harga'];

    $insertQuery = "INSERT INTO obat (nama_obat, kemasan, harga) VALUES ('$nama_obat', '$kemasan', '$harga')";

    if (mysqli_query($mysqli, $insertQuery)) {
        header("location:obat.php");
        exit();
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);
}
?>
