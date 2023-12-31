<?php
include '../koneksi.php';
session_start();
$id_dokter = $_SESSION['id'];
$username = $_SESSION['username'];
$id_poli = $_SESSION['id_poli'];

if ($username == "") {
    header("location:login.php");
}

$query = "SELECT daftar_poli.status_periksa, periksa.id, pasien.alamat, pasien.id as id_pasien, pasien.no_rm, pasien.nama as nama_pasien, daftar_poli.keluhan 
FROM detail_periksa JOIN periksa ON detail_periksa.id_periksa = periksa.id 
JOIN daftar_poli ON periksa.id_daftar_poli = daftar_poli.id 
JOIN pasien ON daftar_poli.id_pasien = pasien.id 
JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id 
JOIN dokter ON jadwal_periksa.id_dokter = dokter.id 
WHERE dokter.id = '$id_dokter' AND status_periksa = '1' GROUP BY pasien.id";
$result = mysqli_query($mysqli, $query);
$rowCount = mysqli_num_rows($result);

$jadwal = "SELECT jadwal_periksa.status, jadwal_periksa.id, jadwal_periksa.id_dokter, 
jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, 
dokter.id AS idDokter, dokter.nama, dokter.alamat, dokter.no_hp, dokter.id_poli, 
poli.id AS idPoli, poli.nama_poli, poli.keterangan 
FROM jadwal_periksa 
JOIN dokter ON jadwal_periksa.id_dokter = dokter.id 
JOIN poli ON dokter.id_poli = poli.id 
WHERE id_poli = '$id_poli' AND id_dokter='$id_dokter'";
$result = mysqli_query($mysqli, $jadwal);
$rowCountJadwal = mysqli_num_rows($result);

$periksa = "SELECT daftar_poli.id as id_daftar_poli, id_pasien, pasien.nama, keluhan, no_antrian, status_periksa, id_jadwal 
FROM daftar_poli 
JOIN pasien ON daftar_poli.id_pasien = pasien.id 
JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id 
JOIN dokter ON jadwal_periksa.id_dokter = dokter.id 
WHERE dokter.id = '$id_dokter' AND status_periksa = '0'";
$result = mysqli_query($mysqli, $periksa);
$rowCountPeriksa = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="../assets/home/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="../assets/css/bootstrap1.min.css" />
    <link rel="stylesheet" href="../assets/vendors/themefy_icon/themify-icons.css" />
    <link rel="stylesheet" href="../assets/vendors/niceselect/css/nice-select.css" />
    <link rel="stylesheet" href="../assets/vendors/owl_carousel/css/owl.carousel.css" />
    <link rel="stylesheet" href="../assets/vendors/gijgo/gijgo.min.css" />
    <link rel="stylesheet" href="../assets/vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="../assets/vendors/tagsinput/tagsinput.css" />
    <link rel="stylesheet" href="../assets/vendors/datepicker/date-picker.css" />
    <link rel="stylesheet" href="../assets/vendors/scroll/scrollable.css" />
    <link rel="stylesheet" href="../assets/vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="../assets/vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="../assets/vendors/datatable/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="../assets/vendors/text_editor/summernote-bs4.css" />
    <link rel="stylesheet" href="../assets/vendors/morris/morris.css">
    <link rel="stylesheet" href="../assets/vendors/material_icon/material-icons.css" />
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/style1.css" />
    <link rel="stylesheet" href="../assets/css/colors/default.css" id="colorSkinCSS">

    <title>Poliklinik</title>
</head>

<body class="crm_body_bg">

    <?php include '../components/sidebar.php'; ?>

    <section class="main_content dashboard_part large_header_bg">

        <?php include '../components/navbar.php'; ?>

        <div class="main_content_iner ">
            <div class="container-fluid p-0 ">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single_element">
                            <div class="quick_activity">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="quick_activity_wrap">
                                            <div class="single_quick_activity blue_bg">
                                                <div class="count_content">
                                                    <p style="color: white;">Jadwal Periksa</p>
                                                    <h3 style="color: white;"><?php echo $rowCountJadwal; ?></h3>
                                                </div>
                                            </div>
                                            <div class="single_quick_activity blue_bg">
                                                <div class="count_content">
                                                    <p style="color: white;">Periksa Pasien</p>
                                                    <h3 style="color: white;"><?php echo $rowCountPeriksa; ?></h3>
                                                </div>
                                            </div>
                                            <div class="single_quick_activity blue_bg">
                                                <div class="count_content">
                                                    <p style="color: white;">Riwayat Pasien</p>
                                                    <h3 style="color: white;"><?php echo $rowCount; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_iner text-center">
                            <p> Fergi Putra Abiansa </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>

    <script src="../assets/js/jquery1-3.4.1.min.js"></script>
    <script src="../assets/js/popper1.min.js"></script>
    <script src="../assets/js/bootstrap1.min.js"></script>
    <script src="../assets/js/metisMenu.js"></script>
    <script src="../assets/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendors/datatable/js/dataTables.responsive.min.js"></script>
    <script src="../assets/vendors/datatable/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendors/datatable/js/buttons.flash.min.js"></script>
    <script src="../assets/vendors/datatable/js/jszip.min.js"></script>
    <script src="../assets/vendors/datatable/js/pdfmake.min.js"></script>
    <script src="../assets/vendors/datatable/js/vfs_fonts.js"></script>
    <script src="../assets/vendors/datatable/js/buttons.html5.min.js"></script>
    <script src="../assets/vendors/datatable/js/buttons.print.min.js"></script>
    <script src="../assets/vendors/scroll/perfect-scrollbar.min.js"></script>
    <script src="../assets/vendors/scroll/scrollable-custom.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>