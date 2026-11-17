<?php
require "../config/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$cek = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' LIMIT 1");

if($cek && mysqli_num_rows($cek) > 0) {
    header("Location: registrasi.php?status=username-exists");
    exit();
} else {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO admin (username, password) VALUES ('$username', '$hash')";
    $simpan = mysqli_query($conn, $query);
    if ($simpan) {
        header("Location: login.php?status=register-success");
        exit();
    } else {
        header("Location: registrasi.php?status=error");
        exit();
    }
}
?>