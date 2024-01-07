<?php
include '../koneksi.php';
session_start();
$username = $_SESSION['username'];
$id_dokter = $_SESSION['id'];
$id_poli = $_SESSION['id_poli'];

if ($username == "") {
    header("location:../auth/login.php");
}

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
                                            <h5 class="modal-title text_white">Tambah Jadwal</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="proses_tambah_jadwal.php" method="post">
                                                <div class="form-group mb-3">
                                                    <label for="hari" class="form-label">Hari</label>
                                                    <select class="form-control" id="hari" name="hari">
                                                        <option value="">-- Pilih Hari --</option>
                                                        <?php
                                                        $jadwal_hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                                        foreach ($jadwal_hari as $hari) {
                                                        ?>
                                                            <option value="<?php echo $hari ?>">
                                                                <?php echo $hari ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="">-- Pilih Status --</option>
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Tidak Aktif</option>
                                                    </select>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <button type="submit" class="btn btn_1 btn-block">Tambah</button>
                                                    </div>
                                                </div>
                                            </form>
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

</body>

</html>