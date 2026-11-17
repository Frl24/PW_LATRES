<?php
session_start();
require "../config/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM admin WHERE username = '$username'";
$hasil = mysqli_query($conn, $query);

if($hasil && mysqli_num_rows($hasil) > 0){
    $user = mysqli_fetch_assoc($hasil);
    if($user && password_verify($password, $user['password'])){
        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username'];
        header("Location: ../dashboard.php");
        exit;
    }else{
        header("Location: login.php?status=password-false");
        exit;
    }
}else{
    header("Location: login.php?status=username-false");
    exit;
}
?>