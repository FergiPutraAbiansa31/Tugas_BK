<?php
    session_start();
    require '../koneksi.php';

    if ($_SERVER['REQUEST_METHOD']== "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // mengecek username dan password admin
        if ($username == "admin" && $password == "admin") {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['akses'] = "admin";
            header("location:../admin");
        }
        else{
            $cekData = "SELECT * FROM dokter WHERE nama = '$username' && password = '$password'";
            $hasil = mysqli_query($mysqli,$cekData);
            if (mysqli_num_rows($hasil)>0) {
                $data = mysqli_fetch_assoc($hasil);
                // mengecek username dan password dokter
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['nama'];
                $_SESSION['password'] = $data['password'];
                $_SESSION['id_poli'] = $data['id_poli'];
                $_SESSION['akses'] = "dokter";
                header("location:../dokter");
            }
            else{
                echo '<script>alert("Email atau password salah");location.href="login.php";</script>';
            }
        }
    }
?>