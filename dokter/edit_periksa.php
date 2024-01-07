<?php
include '../koneksi.php';
session_start();
$username = $_SESSION['username'];
$id_dokter = $_SESSION['id'];
$id_poli = $_SESSION['id_poli'];

if ($username == "") {
    header("location:../auth/login.php");
}
$id_daftar_poli = $_GET['id'];
$query = mysqli_query($mysqli, "SELECT daftar_poli.id as id_daftar_poli, id_pasien, pasien.nama as nama, keluhan, no_antrian, status_periksa, id_jadwal 
FROM daftar_poli
JOIN pasien ON daftar_poli.id_pasien = pasien.id
JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id
JOIN dokter ON jadwal_periksa.id_dokter = dokter.id 
WHERE dokter.id = '$id_dokter' AND daftar_poli.id = '$id_daftar_poli' ");
$data = mysqli_fetch_assoc($query);

$edit_periksa = mysqli_query($mysqli, "SELECT * FROM periksa 
JOIN daftar_poli ON periksa.id_daftar_poli = daftar_poli.id 
WHERE daftar_poli.id = '$id_daftar_poli'");
$edit = mysqli_fetch_assoc($edit_periksa);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Edit Periksa Pasien</title>
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
                                            <h5 class="modal-title text_white">Edit Periksa Pasien</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="proses_edit_periksa.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $data['id_daftar_poli'] ?>">
                                                <div class="form-group mb-3">
                                                    <label for="hari" class="form-label">Nama Pasien</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'] ?>" readonly required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="tgl_periksa" class="form-label">Tanggal Periksa</label>
                                                    <input type="datetime-local" class="form-control" id="tgl_periksa" name="tgl_periksa" value="<?php echo $edit['tgl_periksa'] ?>" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="catatan" class="form-label">Catatan</label>
                                                    <textarea class="form-control" id="catatan" name="catatan" rows="3" required><?php echo $edit['catatan'] ?></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <button type="submit" class="btn btn_1 btn-block">Edit</button>
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