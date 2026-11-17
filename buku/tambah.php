<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
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
    <div class="container-fluid form-container">
        <h3>Tambah Buku</h3>
        <form action="../auth/add_buku.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" class="form-control" id="judul_buku" name="judul_buku" required>
            </div>
            <div class="form-group">
                <label for="id_kategori">Kategori</label>
                <select class="form-control" id="id_kategori" name="id_kategori" required>
                    <?php
                    require "../config/koneksi.php";
                    $query = "SELECT * FROM kategori_buku";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id_kategori'] . "'>" . $row['nama_kategori'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" required>
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
            </div>
            <div class="form-group">
                <label for="cover_buku">Cover Buku</label>
                <input type="file" class="form-control-file" id="cover_buku" name="cover_buku" accept=".jpg,.png,.jpeg">
            </div>
            <button type="submit" class="btn btn-primary">Tambah Buku</button>
        </form>
    </div>
</body>
</html>