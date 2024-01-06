<?php
include '../koneksi.php';
session_start();
$username = $_SESSION['username'];
$idPasien = $_SESSION['id'];

if ($username == "") {
    header("location:login.php");
}

$id = $_GET['id'];
$getDetail = mysqli_query($mysqli, "SELECT daftar_poli.id as idDaftarPoli, 
    poli.nama_poli, dokter.nama, jadwal_periksa.hari, DATE_FORMAT(jadwal_periksa.jam_mulai, 
    '%H:%i') as jamMulai, DATE_FORMAT(jadwal_periksa.jam_selesai, '%H:%i') as jamSelesai, 
    daftar_poli.no_antrian FROM daftar_poli JOIN jadwal_periksa ON daftar_poli.id_jadwal 
    = jadwal_periksa.id JOIN dokter ON jadwal_periksa.id_dokter = dokter.id 
    JOIN poli ON dokter.id_poli = poli.id WHERE daftar_poli.id = '$id'");
$data = mysqli_fetch_assoc($getDetail);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Detail Pasien</title>
    <link rel="icon" href="../assets/home/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="../assets/css/bootstrap1.min.css" />
    <link rel="stylesheet" href="../assets/vendors/themefy_icon/themify-icons.css" />
    <link rel="stylesheet" href="../assets/vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="../assets/vendors/scroll/scrollable.css" />
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/style1.css" />
    <link rel="stylesheet" href="../assets/css/colors/default.css" id="colorSkinCSS">
</head>

<body class="crm_body_bg">

    <?php include '../components/sidebar.php'; ?>

    <section class="main_content dashboard_part large_header_bg">

        <?php include '../components/navbar.php'; ?>

        <div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="white_card card_height_100 mb_30">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="white_box mb_30">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">

                                    <div class="modal-content cs_modal">
                                        <div class="modal-header justify-content-center theme_bg_1">
                                            <h5 class="modal-title text_white">Detail Daftar Poli</h5>
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="text-center">Nomor Antrian</h4>
                                            <h1 class="text-center"><?php echo $data['no_antrian'] ?></h1>
                                            <h5 class="text-center"><?php echo $data['nama_poli'] ?></h5>
                                            <h6 class="text-center"><?php echo $data['hari'] ?>, <?php echo $data['jamMulai'] ?> - <?php echo $data['jamSelesai'] ?></h6>
                                            <p class="text-center text-muted"><?php echo $data['nama'] ?></p>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="daftar_poli.php" class="btn btn_1 btn-block">Back</a>
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
    <script src="../assets/vendors/scroll/perfect-scrollbar.min.js"></script>
    <script src="../assets/vendors/scroll/scrollable-custom.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            $('#poli').on('change', function() {
                var poliId = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: 'getJadwal.php', 
                    data: {
                        poliId: poliId
                    },
                    success: function(data) {
                        $('#jadwal').html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>