<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login</title>
    <link rel="icon" href="../assets/img/logo.png" type="image/png">
    <link rel="stylesheet" href="../assets/css/bootstrap1.min.css" />
    <link rel="stylesheet" href="../assets/vendors/themefy_icon/themify-icons.css" />
    <link rel="stylesheet" href="../assets/vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="../assets/vendors/scroll/scrollable.css" />
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/style1.css" />
    <link rel="stylesheet" href="../assets/css/colors/default.css" id="colorSkinCSS">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url(../images/episodes/ce3.jpg);
        }

        .container {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -55%);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-lg-6 mx-5 py-5 px-5">
                <div class="modal-content cs_modal">
                    <div class="modal-header justify-content-center theme_bg_1">
                        <h5 class="modal-title text_white">Log in</h5>
                    </div>
                    <div class="modal-body">
                        <form action="proses_login.php" method="post">
                            <div class>
                                <input type="text" class="form-control" placeholder="Enter your email" name="email">
                            </div>
                            <div class>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="text-center">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal" class="pass_forget_btn">Forget Password?</a>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="#" class="btn btn_1 btn-block">Back</a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn_1 btn-block">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer style="position: absolute; bottom: 0; width: 100%; text-align: center;">
        <div style="background-color: transparent;" class="container-fluid mt-5">
            <div class="row justify-content-center">
                <div class="col-lg text-center text-white pt-4 pb-2">
                    <p>Fergi Putra Abiansa</p>
                </div>
            </div>
        </div>
    </footer>

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