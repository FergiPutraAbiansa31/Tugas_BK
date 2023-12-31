<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Daftar Poli</title>
    <link rel="icon" href="../assets/home/img/favicon.png" />
    <link rel="stylesheet" href="../assets/home/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/home/css/animate.css" />
    <link rel="stylesheet" href="../assets/home/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../assets/home/css/themify-icons.css" />
    <link rel="stylesheet" href="../assets/home/css/flaticon.css" />
    <link rel="stylesheet" href="../assets/home/css/magnific-popup.css" />
    <link rel="stylesheet" href="../assets/home/css/nice-select.css" />
    <link rel="stylesheet" href="../assets/home/css/slick.css" />
    <link rel="stylesheet" href="../assets/home/css/style.css" />
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php">
                            <img src="../assets/home/img/logo.png" alt="logo" />
                        </a>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="../index.php">Home</a>
                                </li>
                                <li class="d-none d-lg-block">
                                    <a class="btn_1" href="../admin/login.php">LOGIN</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!--::regervation_part start::-->
    <section class="regervation_part" style="margin-top: 100px; margin-bottom: 50px;">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-7 col-md-6">
                    <div class="regervation_part_iner">
                        <form action="proses_daftar.php" method="post">
                            <h2>Daftar Poli</h2>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="no_rm" name="no_rm" placeholder="No Rekam Medis" />
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="poli" name="id_poli">
                                        <option>Pilih Poli</option>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM poli ORDER BY id");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value="<?php echo $row['nama_poli']; ?>">
                                                <?php echo $row['nama_poli']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="dokter" name="id_dokter">
                                        <option value="">Pilih Dokter</option>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM dokter JOIN poli ON dokter.id_poli = poli.id ORDER BY dokter.id");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <option id="dokter" class="<?php echo $row['nama_poli']; ?>" value="<?php echo $row['nama']; ?>">
                                                <?php echo $row['nama']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="jadwal" name="id_jadwal">
                                        <option value="">Pilih Jadwal</option>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM jadwal_periksa JOIN dokter ON jadwal_periksa.id_dokter = dokter.id ORDER BY jadwal_periksa.id");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <option id="jadwal" class="<?php echo $row['nama']; ?>" value="<?php echo $row['hari']; ?>">
                                                <?php echo $row['hari'] ?> , <?php echo $row['jam_mulai'] ?> - <?php echo $row['jam_selesai'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" id="keluhan" name="keluhan" placeholder="Keluhan "></textarea>
                                </div>
                            </div>
                            <div class="regerv_btn">
                                <button type="submit" href="#" class="regerv_btn_iner">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="reservation_img">
                        <img src="../assets/home/img/reservation.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::regervation_part end::-->

    <!-- footer part start-->
    <footer class="footer-area">
        <div class="copyright_part">
            <div class="container">
                <div class="row align-items-center">
                    <p class="footer-text m-0 col-lg-8 col-md-12">
                        Fergi Putra Abiansa
                    </p>
                    <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"> <i class="ti-twitter"></i> </a>
                        <a href="#"><i class="ti-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <script src="../assets/home/js/jquery-1.12.1.min.js"></script>
    <script src="../assets/home/js/popper.min.js"></script>
    <script src="../assets/home/js/bootstrap.min.js"></script>
    <script src="../assets/home/js/jquery.magnific-popup.js"></script>
    <script src="../assets/home/js/swiper.min.js"></script>
    <script src="../assets/home/js/masonry.pkgd.js"></script>
    <script src="../assets/home/js/owl.carousel.min.js"></script>
    <script src="../assets/home/js/jquery.nice-select.min.js"></script>
    <script src="../assets/home/js/slick.min.js"></script>
    <script src="../assets/home/js/jquery.counterup.min.js"></script>
    <script src="../assets/home/js/waypoints.min.js"></script>
    <script src="../assets/home/js/jquery.ajaxchimp.min.js"></script>
    <script src="../assets/home/js/jquery.form.js"></script>
    <script src="../assets/home/js/jquery.validate.min.js"></script>
    <script src="../assets/home/js/mail-script.js"></script>
    <script src="../assets/home/js/contact.js"></script>
    <script src="../assets/home/js/custom.js"></script>
    <script src="../assets/home/js/jquery-1.10.2.min.js"></script>

    <script src="../assets/home/js/jquery.chained.min.js"></script>

    <script>
        $("#dokter").chained("#poli");
    </script>
    <script>
        $("#jadwal").chained("#dokter");
    </script>

</body>

</html>