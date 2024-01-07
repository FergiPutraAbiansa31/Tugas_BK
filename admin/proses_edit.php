<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama_obat = $_POST["nama_obat"];
    $kemasan = $_POST["kemasan"];
    $harga = $_POST["harga"];

    $update_query = mysqli_query($mysqli, "UPDATE obat SET nama_obat='$nama_obat', kemasan='$kemasan', harga='$harga' WHERE id='$id'");

    if ($update_query) {
        header("location:obat.php");
    } else {
        echo "Error updating medicine: " . mysqli_error($mysqli);
    }
}
?>
