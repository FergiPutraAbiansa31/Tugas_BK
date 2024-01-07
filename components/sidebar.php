<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="index.php"><img src="../assets/img/logo3.png" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <?php
        if ($_SESSION['akses'] == "admin") {
            echo '<li class="mm-active">
                    <a href="index.php" aria-expanded="false">
                        <div class="icon_menu">
                            <img src="../assets/img/menu-icon/dashboard.svg" alt>
                        </div>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class>
                    <a href="pasien.php" aria-expanded="false">
                        <div class="icon_menu">
                            <img src="../assets/img/menu-icon/4.svg" alt>
                        </div>
                        <span>Data Pasien</span>
                    </a>
                </li>
                <li class>
                    <a href="dokter.php" aria-expanded="false">
                        <div class="icon_menu">
                            <img src="../assets/img/menu-icon/4.svg" alt>
                        </div>
                        <span>Data Dokter</span>
                    </a>
                </li>
                <li class>
                    <a href="poli.php" aria-expanded="false">
                        <div class="icon_menu">
                            <img src="../assets/img/menu-icon/4.svg" alt>
                        </div>
                        <span>Data Poli</span>
                    </a>
                </li>
                <li class>
                    <a href="obat.php" aria-expanded="false">
                        <div class="icon_menu">
                            <img src="../assets/img/menu-icon/4.svg" alt>
                        </div>
                        <span>Data Obat</span>
                    </a>
                </li>';
            } else if ($_SESSION['akses'] == "dokter") {
                echo '<li class="mm-active">
                        <a href="index.php" aria-expanded="false">
                            <div class="icon_menu">
                                <img src="../assets/img/menu-icon/dashboard.svg" alt>
                            </div>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class>
                        <a href="jadwal_periksa.php" aria-expanded="false">
                            <div class="icon_menu">
                                <img src="../assets/img/menu-icon/4.svg" alt>
                            </div>
                            <span>Jadwal Periksa</span>
                        </a>
                    </li>
                    <li class>
                        <a href="data_periksa.php" aria-expanded="false">
                            <div class="icon_menu">
                                <img src="../assets/img/menu-icon/4.svg" alt>
                            </div>
                            <span>Periksa Pasien</span>
                        </a>
                    </li>
                    <li class>
                        <a href="riwayat.php" aria-expanded="false">
                            <div class="icon_menu">
                                <img src="../assets/img/menu-icon/4.svg" alt>
                            </div>
                            <span>Riwayat Pasien</span>
                        </a>
                    </li>';
            } else if ($_SESSION['akses'] == "pasien") {
                echo '<li class="mm-active">
                        <a href="index.php" aria-expanded="false">
                            <div class="icon_menu">
                                <img src="../assets/img/menu-icon/dashboard.svg" alt>
                            </div>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class>
                        <a href="daftar_poli.php" aria-expanded="false">
                            <div class="icon_menu">
                                <img src="../assets/img/menu-icon/4.svg" alt>
                            </div>
                            <span>Daftar Poli</span>
                        </a>
                    </li>';
            }
        ?>
    </ul>
</nav>