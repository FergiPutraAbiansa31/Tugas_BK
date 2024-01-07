<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_poli = $_POST["nama_poli"];
    $keterangan = $_POST["keterangan"];

    $insertQuery = "INSERT INTO poli (nama_poli, keterangan) VALUES ('$nama_poli', '$keterangan')";

    if (mysqli_query($mysqli, $insertQuery)) {
        header("location:poli.php");
        exit();
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($mysqli);
    }

    mysqli_close($mysqli);
}
?>
