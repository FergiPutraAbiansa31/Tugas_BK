<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from the form
    $no_rm = $_POST['no_rm'];
    $id_poli = $_POST['id_poli'];
    $id_dokter = $_POST['id_dokter'];
    $id_jadwal = $_POST['id_jadwal'];
    $keluhan = $_POST['keluhan'];

    // Get the name of the patient based on the given $no_rm
    $query_get_patient_name = mysqli_query($conn, "SELECT nama FROM pasien WHERE no_rm = '$no_rm'");
    $row_patient = mysqli_fetch_assoc($query_get_patient_name);
    $nama_pasien = $row_patient['nama'];

    // Insert into daftar_poli table
    $query_insert_daftar_poli = "INSERT INTO daftar_poli (id_pasien, id_poli, id_dokter, id_jadwal, keluhan) VALUES ('$no_rm', '$id_poli', '$id_dokter', '$id_jadwal', '$keluhan')";
    mysqli_query($conn, $query_insert_daftar_poli);

    // Get the last inserted ID (assuming it's an auto-incremented primary key)
    $last_inserted_id = mysqli_insert_id($conn);

    // Generate an appointment number (you can customize this based on your needs)
    $no_antrian = "AN" . date('Ymd') . str_pad($last_inserted_id, 4, '0', STR_PAD_LEFT);

    // Insert into periksa table
    $query_insert_periksa = "INSERT INTO periksa (id_daftar_poli, nama, tgl_periksa, keluhan) VALUES ('$last_inserted_id', '$nama_pasien', NOW(), '$keluhan')";
    mysqli_query($conn, $query_insert_periksa);

    // Update daftar_poli with the generated no_antrian
    $query_update_daftar_poli = "UPDATE daftar_poli SET no_antrian = '$no_antrian' WHERE id = '$last_inserted_id'";
    mysqli_query($conn, $query_update_daftar_poli);

    // Redirect or perform other actions as needed
    header("Location: success_page.php"); // Replace with the desired success page
    exit();
} else {
    // Handle invalid access or redirect to an error page
    header("Location: error_page.php");
    exit();
}
