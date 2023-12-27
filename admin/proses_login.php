<?php
session_start();
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['login_user'] = $user['email'];

        // Redirect based on user role
        if ($user['role'] == 'admin') {
            header("location: index.php");
        } elseif ($user['role'] == 'dokter') {
            header("location: ../dokter/index.php");
        } else {
            // Jika terdapat role lain, sesuaikan dengan kondisi Anda
            header("location: index.php");
        }
    } else {
        $error = "Email or password is invalid";
        header("location: login.php");
    }
}
mysqli_close($conn);
?>
