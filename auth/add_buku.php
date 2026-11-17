<?php
require "../config/koneksi.php";

$judul_buku = $_POST['judul_buku'];
$id_kategori = $_POST['id_kategori'];
$pengarang = $_POST['pengarang'];
$tahun_terbit = $_POST['tahun_terbit'];
$cover_buku = $_FILES['cover_buku'];

$query = "INSERT INTO buku (judul_buku, id_kategori, pengarang, tahun_terbit) VALUES ('$judul_buku', '$id_kategori', '$pengarang', '$tahun_terbit')";
if(mysqli_query($conn, $query)) {
    $id_buku = mysqli_insert_id($conn);
    $ekstensi = strtolower(pathinfo($_FILES['cover_buku']['name'], PATHINFO_EXTENSION));
    $nama_cover = $id_buku . '_' . $judul_buku . '.' . $ekstensi;
    move_uploaded_file($cover_buku['tmp_name'], "../assets/images/" . $nama_cover);
    mysqli_query($conn, "UPDATE buku SET cover_buku = '$nama_cover' WHERE id_buku = '$id_buku'");
    header("Location: ../dashboard.php?status=tambah_buku_success");
} else {
    header("Location: ../dashboard.php?status=tambah_buku_error");
}
?>