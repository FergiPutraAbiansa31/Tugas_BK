<?php
    require '../koneksi.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_daftar_poli = $_POST['id'];
        $tgl_periksa = $_POST['tgl_periksa'];
        $catatan = $_POST['catatan'];

        $queryUpdate = mysqli_query($mysqli,"UPDATE periksa SET tgl_periksa = '$tgl_periksa', 
        catatan = '$catatan' WHERE id_daftar_poli = '$id_daftar_poli'");
        
        if ($queryUpdate) {
            echo '<script>alert("Data berhasil diubah");window.location.href="data_periksa.php"</script>';
        }
        else{
            echo '<script>alert("Data gagal diubah");window.location.href="data_periksa.php"</script>';
        }
    }
?>