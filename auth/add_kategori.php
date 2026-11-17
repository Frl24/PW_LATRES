<?php 
require "../config/koneksi.php";

$nama_kategori = $_POST['nama_kategori'];
$query = "INSERT INTO kategori_buku (nama_kategori) VALUES ('$nama_kategori')";
if(mysqli_query($conn, $query)) {
    header("Location: ../dashboard.php?status=tambah_kategori_success");
} else {
    header("Location: ../dashboard.php?status=tambah_kategori_error");
}
?>