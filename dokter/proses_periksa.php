<?php
include '../koneksi.php';
session_start();
$id_dokter = $_SESSION['id'];
$username = $_SESSION['username'];
$id_poli = $_SESSION['id_poli'];

if ($username == "") {
    header("location:../auth/login.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $tgl_periksa = $_POST['tgl_periksa'];
    $catatan = $_POST['catatan'];
    $obat = $_POST['obat'];
    $biaya_periksa = $_POST['biaya_periksa'];

    // Update status_periksa pada tabel daftar_poli
    $status_periksa = "UPDATE daftar_poli SET status_periksa = '1' WHERE id = '$id' ";
    $query_status_periksa = mysqli_query($mysqli, $status_periksa);

    if ($query_status_periksa) {
        // Insert data periksa ke tabel periksa
        $insert_periksa = "INSERT INTO periksa (id_daftar_poli, tgl_periksa, catatan, biaya_periksa) VALUES ('$id', '$tgl_periksa', '$catatan', '$biaya_periksa')";
        $query_insert_periksa = mysqli_query($mysqli, $insert_periksa);

        if ($query_insert_periksa) {
            // Mengambil ID yang baru saja di-generate oleh AUTO_INCREMENT pada kolom 'id' di tabel 'periksa'
            $id_periksa = mysqli_insert_id($mysqli);

            // Insert data obat ke tabel detail_periksa
            foreach ($obat as $id_obat) {
                $insert_detail_periksa = "INSERT INTO detail_periksa (id_periksa, id_obat) VALUES ('$id_periksa', '$id_obat')";
                $query_detail_periksa = mysqli_query($mysqli, $insert_detail_periksa);

                if (!$query_detail_periksa) {
                    echo '<script>alert("Error saat menambahkan detail periksa: ' . mysqli_error($mysqli) . '");window.location.href="data_periksa.php"</script>';
                    exit();
                }
            }

            echo '<script>alert("Pasien telah diperiksa");window.location.href="data_periksa.php"</script>';
        } else {
            echo '<script>alert("Error saat menambahkan data periksa: ' . mysqli_error($mysqli) . '");window.location.href="data_periksa.php"</script>';
        }
    } else {
        echo '<script>alert("Error saat mengupdate status periksa: ' . mysqli_error($mysqli) . '");window.location.href="data_periksa.php"</script>';
    }
} else {
    // Jika bukan metode POST, kembalikan ke halaman periksa.php
    header("location: data_periksa.php");
}
?>
