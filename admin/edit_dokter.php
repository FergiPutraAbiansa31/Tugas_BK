<?php
include '../koneksi.php';
session_start();
$username = $_SESSION['username'];

if ($username == "") {
    header("location:../auth/login.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($mysqli, "SELECT * FROM dokter WHERE id = '$id'");
    $dokter = mysqli_fetch_array($query);
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Tambah Dokter</title>
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
                                            <h5 class="modal-title text_white">Edit Dokter</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="proses_edit_dokter.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $dokter['id']; ?>">
                                                <div class="form-group mb-3">
                                                    <label for="nama" class="form-label">Nama Dokter</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $dokter['nama'] ?>" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $dokter['alamat'] ?></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="no_hp" class="form-label">No HP</label>
                                                    <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?php echo $dokter['no_hp'] ?>" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="poli">Poli</label>
                                                    <select class="form-control" id="poli" name="poli">
                                                        <?php
                                                        $query = "SELECT * FROM poli";
                                                        $result = mysqli_query($mysqli, $query);
                                                        while ($poli = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                            <option value="<?php echo $poli['id'] ?>" <?php if ($poli['id'] == $dokter['id_poli']) echo 'selected'; ?>>
                                                                <?php echo $poli['nama_poli'] ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <button type="submit" class="btn btn_1 btn-block"><i class="ti-save"></i>Ubah</button>
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