<?php

include '../koneksi.php';
session_start();
$username = $_SESSION['username'];

if ($username == "") {
    header("location:login.php");
}
$idPasien = $_SESSION['id'];
$query = "SELECT daftar_poli.id as idDaftarPoli, poli.nama_poli, dokter.nama, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, daftar_poli.no_antrian 
FROM daftar_poli JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id 
JOIN dokter ON jadwal_periksa.id_dokter = dokter.id 
JOIN poli ON dokter.id_poli = poli.id 
WHERE daftar_poli.id_pasien = '$idPasien'";

$result = mysqli_query($mysqli, $query);
$rowCount = mysqli_num_rows($result);
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
                                                    <p style="color: white;">Riwayat Periksa</p>
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