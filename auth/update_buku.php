<?php 
require "../config/koneksi.php";

$id_buku = $_POST['id_buku'];
$judul_buku = $_POST['judul_buku'];
$id_kategori = $_POST['id_kategori'];
$pengarang = $_POST['pengarang'];
$tahun_terbit = $_POST['tahun_terbit'];
$cover_buku = $_FILES['cover_buku'];

$query = "UPDATE buku SET judul_buku = '$judul_buku', id_kategori = '$id_kategori', pengarang = '$pengarang', tahun_terbit = '$tahun_terbit' WHERE id_buku = '$id_buku'";
if(mysqli_query($conn, $query)) {
    if(isset($_FILES['cover_buku']) && $_FILES['cover_buku']['error'] === 0) {
        $ekstensi = strtolower(pathinfo($_FILES['cover_buku']['name'], PATHINFO_EXTENSION));
        $nama_cover = $id_buku . '_' . $judul_buku . '.' . $ekstensi;
        if(move_uploaded_file($cover_buku['tmp_name'], "../assets/images/" . $nama_cover)) {
            mysqli_query($conn, "UPDATE buku SET cover_buku = '$nama_cover' WHERE id_buku = '$id_buku'");
        }
    }
    header("Location: ../dashboard.php?status=update_buku_success");
} else {
    header("Location: ../dashboard.php?status=update_buku_error");
}
?>