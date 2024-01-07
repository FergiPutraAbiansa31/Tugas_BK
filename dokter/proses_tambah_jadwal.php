<?php
include '../koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_poli = $_SESSION['id_poli'];
    $id_dokter = $_SESSION['id'];
    $hari = $_POST["hari"];
    $jam_mulai = $_POST["jam_mulai"];
    $jam_selesai = $_POST["jam_selesai"];
    $status = $_POST["status"];

    $queryjadwal = "SELECT * FROM jadwal_periksa
    JOIN dokter ON jadwal_periksa.id_dokter = dokter.id 
    JOIN poli ON dokter.id_poli = poli.id 
    WHERE id_poli = '$id_poli' 
    AND hari = '$hari' 
    AND ((jam_mulai < '$jam_selesai' 
    AND jam_selesai > '$jam_mulai') 
    OR (jam_mulai < '$jam_mulai' AND jam_selesai > '$jam_mulai'))";

    $jadwal = mysqli_query($mysqli,$queryjadwal);
    
    if (mysqli_num_rows($jadwal)>0) {
        echo '<script>alert("Dokter lain telah mengambil jadwal ini");window.location.href="jadwal_periksa.php";</script>';
    }
    else{
        // Query tambah data jadwal
        $query = "INSERT INTO jadwal_periksa (id_dokter, hari, jam_mulai, jam_selesai, status) VALUES ('$id_dokter', '$hari', '$jam_mulai', '$jam_selesai', '$status')";

        if (mysqli_query($mysqli, $query)) {
            echo '<script>';
            echo 'alert("Jadwal berhasil ditambahkan!");';
            echo 'window.location.href = "jadwal_periksa.php";';
            echo '</script>';
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
        }
    }
}
mysqli_close($mysqli);
?>