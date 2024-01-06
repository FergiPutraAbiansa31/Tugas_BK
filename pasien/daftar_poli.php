<?php
include '../koneksi.php';
session_start();
$username = $_SESSION['username'];
$idPasien = $_SESSION['id'];

if ($username == "") {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Daftar Poli</title>
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
</head>

<body class="crm_body_bg">

    <?php include '../components/sidebar.php'; ?>

    <section class="main_content dashboard_part large_header_bg">

        <?php include '../components/navbar.php'; ?>

        <div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="dashboard_header mb_50">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="dashboard_header_title">
                                        <h3>Daftar Poli</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="white_box QA_section mb_30">
                            <div class="white_box_tittle list_header">
                                <h4>Daftar Poli</h4>
                            </div>
                            <form action="proses_daftarpoli.php" method="post">
                                <div class="form-group mb-3">
                                    <label for="no_rm font-weight-bold">No Rekam Medis</label>
                                    <input type="text" id="no_rm" name="no_rm" class="form-control mb-2" value="<?php echo $_SESSION['no_rm'] ?>" readonly required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="poli">Poli</label>
                                    <select id="poli" name="poli" class="form-control" required>
                                        <option value="">-- Pilih Poli --</option>
                                        <?php
                                        $queryPoli = "SELECT * FROM poli";
                                        $resultPoli = mysqli_query($mysqli, $queryPoli);
                                        while ($dataPoli = mysqli_fetch_assoc($resultPoli)) {
                                        ?>
                                            <option value="<?php echo $dataPoli['id'] ?>">
                                                <?php echo $dataPoli['nama_poli'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Jadwal</label>
                                    <select class="form-control" id="jadwal" name="jadwal" required>
                                        <option value="">-- Pilih Jadwal --</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="keluhan">Keluhan</label>
                                    <textarea id="keluhan" name="keluhan" class="form-control" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="white_box QA_section mb_30">
                            <div class="white_box_tittle list_header">
                                <h4>Riwayat Daftar</h4>
                            </div>
                            <div class="QA_table ">

                                <table class="table lms_table_active">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Poli</th>
                                            <th scope="col">Dokter</th>
                                            <th scope="col">Hari</th>
                                            <th scope="col">Mulai</th>
                                            <th scope="col">Selesai</th>
                                            <th scope="col">Antrian</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $queryObat = "SELECT daftar_poli.id as idDaftarPoli, poli.nama_poli, dokter.nama, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, daftar_poli.no_antrian 
                                        FROM daftar_poli INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id 
                                        INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id 
                                        INNER JOIN poli ON dokter.id_poli = poli.id 
                                        WHERE daftar_poli.id_pasien = '$idPasien'";
                                        $resultObat = mysqli_query($mysqli, $queryObat);

                                        while ($data = mysqli_fetch_assoc($resultObat)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data['nama_poli'] ?></td>
                                                <td><?php echo $data['nama'] ?></td>
                                                <td><?php echo $data['hari'] ?></td>
                                                <td><?php echo $data['jam_mulai'] ?></td>
                                                <td><?php echo $data['jam_selesai'] ?></td>
                                                <td><?php echo $data['no_antrian'] ?></td>
                                                <td>
                                                    <a href="detail_daftarpoli.php?id=<?php echo $data['idDaftarPoli'] ?>" class="btn btn-sm"><i class='ti-eye'></i> detail</a>
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
    <script src="../assets/vendors/count_up/jquery.waypoints.min.js"></script>
    <script src="../assets/vendors/chartlist/Chart.min.js"></script>
    <script src="../assets/vendors/count_up/jquery.counterup.min.js"></script>
    <script src="../assets/vendors/niceselect/js/jquery.nice-select.min.js"></script>
    <script src="../assets/vendors/owl_carousel/js/owl.carousel.min.js"></script>
    <script src="../assets/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendors/datatable/js/dataTables.responsive.min.js"></script>
    <script src="../assets/vendors/datatable/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendors/datatable/js/buttons.flash.min.js"></script>
    <script src="../assets/vendors/datatable/js/jszip.min.js"></script>
    <script src="../assets/vendors/datatable/js/pdfmake.min.js"></script>
    <script src="../assets/vendors/datatable/js/vfs_fonts.js"></script>
    <script src="../assets/vendors/datatable/js/buttons.html5.min.js"></script>
    <script src="../assets/vendors/datatable/js/buttons.print.min.js"></script>
    <script src="../assets/js/chart.min.js"></script>
    <script src="../assets/vendors/progressbar/jquery.barfiller.js"></script>
    <script src="../assets/vendors/tagsinput/tagsinput.js"></script>
    <script src="../assets/vendors/text_editor/summernote-bs4.js"></script>
    <script src="../assets/vendors/am_chart/amcharts.js"></script>
    <script src="../assets/vendors/scroll/perfect-scrollbar.min.js"></script>
    <script src="../assets/vendors/scroll/scrollable-custom.js"></script>
    <script src="../assets/vendors/chart_am/core.js"></script>
    <script src="../assets/vendors/chart_am/charts.js"></script>
    <script src="../assets/vendors/chart_am/animated.js"></script>
    <script src="../assets/vendors/chart_am/kelly.js"></script>
    <script src="../assets/vendors/chart_am/chart-custom.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/home/js/jquery-1.10.2.min.js"></script>
    <script src="../assets/home/js/jquery.chained.min.js"></script>
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