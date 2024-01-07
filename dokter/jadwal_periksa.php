<?php
include '../koneksi.php';
session_start();
$username = $_SESSION['username'];
$id_dokter = $_SESSION['id'];
$id_poli = $_SESSION['id_poli'];

if ($username == "") {
    header("location:../auth/login.php");
}

$jadwal = mysqli_query($mysqli, "SELECT jadwal_periksa.status, jadwal_periksa.id, jadwal_periksa.id_dokter, 
jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, 
dokter.id AS idDokter, dokter.nama, dokter.alamat, dokter.no_hp, dokter.id_poli, 
poli.id AS idPoli, poli.nama_poli, poli.keterangan 
FROM jadwal_periksa 
JOIN dokter ON jadwal_periksa.id_dokter = dokter.id 
JOIN poli ON dokter.id_poli = poli.id 
WHERE id_poli = '$id_poli' AND id_dokter='$id_dokter'");
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
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Jadwal Periksa</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="QA_section">
                                    <div class="white_box_tittle list_header">
                                        <h4>Jadwal</h4>
                                        <div class="box_right d-flex lms_block">
                                            <div class="add_button ms-2">
                                                <a href="tambah_jadwal.php" class="btn_1">
                                                    Tambah
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="QA_table mb_30">
                                        <table class="table lms_table_active">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Hari</th>
                                                    <th scope="col">Jam Mulai</th>
                                                    <th scope="col">Jam Selesai</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                while ($row = mysqli_fetch_array($jadwal)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $row['nama'] ?></td>
                                                        <td><?php echo $row['hari'] ?></td>
                                                        <td><?php echo $row['jam_mulai'] ?></td>
                                                        <td><?php echo $row['jam_selesai'] ?></td>
                                                        <td>
                                                            <?php if ($row['status'] == '1') : ?>
                                                                <a class="status_btn">Aktif</a>
                                                            <?php else : ?>
                                                                <a class="status_btn yellow_btn">Tidak Aktif</a>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <a href="edit_jadwal.php?id=<?php echo $row['id']; ?>" class="status_btn yellow_btn"><i class='fas fa-edit'></i> EDIT</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>

                                        </table>
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