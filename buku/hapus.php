<?php
require "../config/koneksi.php";

$id_buku = $_GET['id'] ?? $_GET['id_buku'] ?? null;
$query = "DELETE FROM buku WHERE id_buku = '$id_buku'";
if(mysqli_query($conn, $query)) {
    header("Location: ../dashboard.php?status=hapus_buku_success");
} else {
    header("Location: ../dashboard.php?status=hapus_buku_error");
}
?>