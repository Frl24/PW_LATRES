<?php
require "../config/koneksi.php";
$query = "SELECT * FROM kategori_buku";
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
</head>
<body>
    <div class="navbar navbar-default navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Perpustakaan</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../auth/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid dashboard-container">
        <h2>Kelola Kategori</h2>
        <a href="tambah.php" class="btn btn-success">Tambah Kategori</a>
        <a href="../dashboard.php" class="btn btn-default">Kembali ke Dashboard</a>
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($hasil)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama_kategori']) . "</td>";
                    echo "<td>";
                    echo "<a href='hapus.php?id_kategori=" . $row['id_kategori'] . "' class='btn btn-danger' onclick=\"return confirm('Apakah Anda yakin ingin menghapus kategori ini?')\">Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
</body>
</html>