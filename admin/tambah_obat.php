<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_obat = $_POST['nama_obat'];
    $kemasan = $_POST['kemasan'];
    $harga = $_POST['harga'];

    $insert_query = "INSERT INTO obat (nama_obat, kemasan, harga) VALUES ('$nama_obat', '$kemasan', '$harga')";
    
    if (mysqli_query($mysqli, $insert_query)) {
        mysqli_close($mysqli);
        header('Location: obat.php');
        exit();
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}
?>
