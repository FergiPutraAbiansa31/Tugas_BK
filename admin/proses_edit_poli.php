<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama_poli = $_POST["nama_poli"];
    $keterangan = $_POST["keterangan"];

    $update_query = mysqli_query($mysqli, "UPDATE poli SET nama_poli='$nama_poli', keterangan='$keterangan' WHERE id='$id'");

    if ($update_query) {
        header("location:poli.php");
    } else {
        echo "Error update poli: " . mysqli_error($mysqli);
    }
}
?>
