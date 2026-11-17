<?php
session_start();
$_status = $_GET['status'] ?? null;
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: auth/login.php");
    exit;
}

require "config/koneksi.php";
$query = "SELECT b.id_buku, b.judul_buku, k.nama_kategori, b.pengarang, b.tahun_terbit, b.cover_buku FROM buku b INNER JOIN kategori_buku k ON b.id_kategori = k.id_kategori ORDER BY b.judul_buku ASC";
$hasil = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js" defer></script>
</head>
<body>
    <div class="navbar navbar-default navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Perpustakaan</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="auth/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid dashboard-container">
        <h2>Welcome to the Dashboard</h2>
        <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>! You are logged in.</p>
        <br>
        <?php if ($_status === 'tambah_buku_success'): ?>
            <div class="alert alert-success">Buku berhasil ditambahkan.</div>
        <?php elseif ($_status === 'tambah_buku_error'): ?>
            <div class="alert alert-danger">Terjadi kesalahan saat menambahkan buku.</div>
        <?php elseif ($_status === 'update_buku_success'): ?>
            <div class="alert alert-success">Buku berhasil diupdate.</div>
        <?php elseif ($_status === 'update_buku_error'): ?>
            <div class="alert alert-danger">Terjadi kesalahan saat mengupdate buku.</div>
        <?php elseif ($_status === 'hapus_buku_success'): ?>
            <div class="alert alert-success">Buku berhasil dihapus.</div>
        <?php elseif ($_status === 'hapus_buku_error'): ?>
            <div class="alert alert-danger">Terjadi kesalahan saat menghapus buku.</div>
        <?php elseif ($_status === 'tambah_kategori_success'): ?>
            <div class="alert alert-success">Kategori berhasil ditambahkan.</div>
        <?php elseif ($_status === 'tambah_kategori_error'): ?>
            <div class="alert alert-danger">Terjadi kesalahan saat menambahkan kategori.</div>
        <?php elseif ($_status === 'hapus_kategori_success'): ?>
            <div class="alert alert-success">Kategori berhasil dihapus.</div>
        <?php elseif ($_status === 'hapus_kategori_error'): ?>
            <div class="alert alert-danger">Terjadi kesalahan saat menghapus kategori.</div>
        <?php endif; ?>
    
        <h3>Daftar Buku</h3>
        <a href="buku/tambah.php" class="btn btn-success">Tambah Buku</a>
        <a href="kategori/kelola.php" class="btn btn-info">Kelola Kategori</a>
        <br><br>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Cover Buku</th>
                        <th>Judul Buku</th>
                        <th>Kategori</th>
                        <th>Tahun Terbit</th>
                        <th>Pengarang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        while($output = mysqli_fetch_assoc($hasil)){
                        ?>
                        <tr>
                        <td>
                        <?php echo $no; ?>
                        </td>
                        <td>
                            <img src="assets/images/<?php echo $output['cover_buku']; ?>" alt="Cover Buku" width="100">
                        </td>
                        <td>
                            <?php echo $output['judul_buku']; ?>
                        </td>
                        <td>
                            <?php echo $output['nama_kategori']; ?>
                        </td>
                        <td>
                            <?php echo $output['tahun_terbit']; ?>
                        </td>
                        <td>
                            <?php echo $output['pengarang']; ?>
                        </td>
                        <td>
                            <a href="buku/edit.php?id=<?php echo $output['id_buku']; ?>" class="btn btn-primary">Edit</a>
                            <a href="buku/hapus.php?id=<?php echo $output['id_buku']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</a>
                        </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        ?> 
                </tbody>
            </table>
    </div>
</body>
</html>