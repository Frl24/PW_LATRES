<?php
require "../config/koneksi.php";

$id_kategori = $_GET['id_kategori'];
$query = "DELETE FROM kategori_buku WHERE id_kategori = '$id_kategori'";
if(mysqli_query($conn, $query)) {
    header("Location: ../dashboard.php?status=hapus_kategori_success");
} else {
    header("Location: ../dashboard.php?status=hapus_kategori_error");
}
?>