<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_ktp = $_POST["no_ktp"];
    $no_hp = $_POST["no_hp"];

    $check_query = "SELECT * FROM pasien WHERE no_ktp = '$no_ktp'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        echo "No KTP already registered!";
    } else {
        $current_year = date("Y");
        $current_month = date("m"); 
        $incremental_number_query = "SELECT COUNT(*) as count FROM pasien";
        $result_count = $conn->query($incremental_number_query);

        if ($result_count->num_rows > 0) {
            $row = $result_count->fetch_assoc();
            $incremental_number = $row["count"] + 1;
        } else {
            $incremental_number = 1;
        }

        $medical_record_number = "RM: " . $current_year . $current_month . "-" . sprintf("%03d", $incremental_number);

        $insert_query = "INSERT INTO pasien (nama, alamat, no_ktp, no_hp, no_rm) 
                         VALUES ('$nama', '$alamat', '$no_ktp', '$no_hp', '$medical_record_number')";

        if ($conn->query($insert_query) === TRUE) {
            header("Location: no_rm.php?rm=$medical_record_number");
            exit();
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
