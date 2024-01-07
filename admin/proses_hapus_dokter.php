<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleteQuery = mysqli_prepare($mysqli, "DELETE FROM dokter WHERE id = ?");
    mysqli_stmt_bind_param($deleteQuery, 'i', $id);

    if (mysqli_stmt_execute($deleteQuery)) {
        header("location: dokter.php");
    } else {
        echo "Error deleting record: " . mysqli_stmt_error($deleteQuery);
    }

    mysqli_stmt_close($deleteQuery);
}
?>