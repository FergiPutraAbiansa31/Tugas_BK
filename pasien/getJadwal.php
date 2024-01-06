<?php
require '../koneksi.php';

$poliId = $_POST['poliId'];

$query = "SELECT jadwal_periksa.id as idJadwal, dokter.nama, jadwal_periksa.hari, DATE_FORMAT(jadwal_periksa.jam_mulai, '%H:%i') as jamMulai, DATE_FORMAT(jadwal_periksa.jam_selesai, '%H:%i') as jamSelesai FROM jadwal_periksa INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id INNER JOIN poli ON dokter.id_poli = poli.id WHERE poli.id = '$poliId'";
$result = mysqli_query($mysqli, $query);

if ($result) {
    if (mysqli_num_rows($result)>0) {
        $jadwalOptions = "";
        while ($dataJadwal = mysqli_fetch_assoc($result)) {
            $jadwalOptions .= "<option value='" . $dataJadwal['idJadwal'] . "'>" . $dataJadwal['nama'] . ' - ' . $dataJadwal['hari'] . ' ' . $dataJadwal['jamMulai'] . ' - ' . $dataJadwal['jamSelesai'] . "</option>";
        }
        echo $jadwalOptions;
    }
    else{
        echo "<option value=''>Jadwal tidak ditemukan</option>";
    }

    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($mysqli);
}

mysqli_close($mysqli);
?>