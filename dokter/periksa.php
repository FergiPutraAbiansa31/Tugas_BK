<?php
include '../koneksi.php';
session_start();
$id_dokter = $_SESSION['id'];
$username = $_SESSION['username'];
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

$id_pasien = $data['id_pasien'];
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
    <link rel="stylesheet" href="../assets/vendors/select2/css/select2.min.css" />
    <link rel="stylesheet" href="../assets/vendors/select2/css/select2-bootstrap4.min.css" />
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
                    <div class="col-md-6">
                        <div class="white_box QA_section mb_30">
                            <div class="white_box_tittle list_header">
                                <h4>Periksa Pasien</h4>
                            </div>
                            <form action="proses_periksa.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $id_daftar_poli ?>">
                                <div class="form-group mb-3">
                                    <label for="no_rm font-weight-bold">Nama Pasien</label>
                                    <input type="text" id="nama" name="nama" class="form-control mb-2" value="<?php echo $data['nama'] ?>" readonly required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="poli">Tanggal Periksa</label>
                                    <input type="datetime-local" id="tgl_periksa" name="tgl_periksa" class="form-control mb-2" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Catatan</label>
                                    <textarea id="catatan" name="catatan" class="form-control" rows="3" required></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Obat</label>
                                    <select class="select2" multiple="multiple" style="width: 100%;" name="obat[]">
                                        <?php
                                        $data_obat = "SELECT * FROM obat";
                                        $query = mysqli_query($mysqli, $data_obat);
                                        while ($pilih_obat = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <option value="<?php echo $pilih_obat['id'] ?>" data-harga="<?php echo $pilih_obat['harga'] ?>" id="obat_<?php echo $pilih_obat['id'] ?>">
                                                <?php echo $pilih_obat['nama_obat'] ?> - <?php echo $pilih_obat['harga'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="no_rm font-weight-bold">Biaya Periksa</label>
                                    <input type="text" id="biaya_periksa" name="biaya_periksa" class="form-control mb-2" readonly required>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="ti-save"></i> Simpan</button>
                            </form>
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
    <script src="../assets/vendors/select2/js/select2.full.min.js"></script>
    <script>
        $(function() {
            $('.select2').select2()

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            // menghitung dan memperbarui total biaya
            function updateBiayaPeriksa() {
                var selectedObats = $('select[name="obat[]"]').val();
                // Set default biaya periksa
                var biayaPeriksa = 150000;
                // Jika obat dipilih, hitung total biayanya
                if (selectedObats && selectedObats.length > 0) {
                    biayaPeriksa += selectedObats.reduce(function(total, obatId) {
                        var obatPrice = parseFloat($('#obat_' + obatId).data('harga')) || 0;
                        return total + obatPrice;
                    }, 0);
                }
                // Update biaya_periksa input value
                $('#biaya_periksa').val(biayaPeriksa);
            }
            $('select[name="obat[]"]').on('change', function() {
                updateBiayaPeriksa();
            });
            updateBiayaPeriksa();
        });
    </script>
</body>

</html>