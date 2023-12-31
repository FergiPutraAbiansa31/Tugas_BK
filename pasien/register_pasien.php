<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Register Pasien</title>
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
                        <form action="proses_register.php" method="post">
                            <h2>Register Pasien</h2>
                            <div class="form-row">
                                <div class="form-group col-md-11">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" />
                                </div>
                                <div class="form-group col-md-11">
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" />
                                </div>
                                <div class="form-group col-md-11">
                                    <input type="number" class="form-control" id="no_ktp" name="no_ktp" placeholder="No KTP" />
                                </div>
                                <div class="form-group col-md-11">
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" />
                                </div>
                            </div>
                            <div class="regerv_btn">
                            <button type="submit" class="regerv_btn_iner">Register</button>
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
</body>

</html>