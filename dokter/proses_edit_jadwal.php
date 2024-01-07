<?php
include '../koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $id_poli = $_SESSION['id_poli'];
    $id_dokter = $_SESSION['id'];
    $hari = $_POST["hari"];
    $jam_mulai = $_POST["jam_mulai"];
    $jam_selesai = $_POST["jam_selesai"];
    $status = $_POST["status"];


    $queryjadwal = "SELECT jadwal_periksa.id, jadwal_periksa.id_dokter, jadwal_periksa.hari, jadwal_periksa.jam_mulai, 
    jadwal_periksa.jam_selesai, dokter.id AS idDokter, dokter.nama, dokter.alamat, dokter.no_hp, dokter.id_poli, poli.id 
    AS idPoli, poli.nama_poli, poli.keterangan 
    FROM jadwal_periksa 
    JOIN dokter ON jadwal_periksa.id_dokter = dokter.id 
    JOIN poli ON dokter.id_poli = poli.id 
    WHERE id_poli = '$id_poli' 
    AND id_dokter = '$id_dokter' 
    AND hari = '$hari' 
    AND ((jam_mulai < '$jam_selesai' 
    AND jam_selesai > '$jam_mulai') 
    OR (jam_mulai < '$jam_mulai' 
    AND jam_selesai > '$jam_mulai'))
    AND jadwal_periksa.status = '$status'";

    $jadwal = mysqli_query($mysqli, $queryjadwal);

    if (mysqli_num_rows($jadwal) > 0) {
        echo '<script>alert("Dokter lain telah mengambil jadwal ini");window.location.href="jadwal_periksa.php";</script>';
    } else {
        $query = "UPDATE jadwal_periksa SET hari = '$hari', jam_mulai = '$jam_mulai', jam_selesai = '$jam_selesai', status = '$status' WHERE id = '$id'";
        if (mysqli_query($mysqli, $query)) {
            echo '<script>';
            echo 'alert("Jadwal berhasil diubah!");';
            echo 'window.location.href = "jadwal_periksa.php";';
            echo '</script>';
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
        }
    }
}
mysqli_close($mysqli);
