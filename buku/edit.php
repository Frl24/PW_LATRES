<?php
require "../config/koneksi.php";

$id_buku = $_GET['id'];
$query = "SELECT b.*, k.nama_kategori FROM buku b INNER JOIN kategori_buku k ON b.id_kategori = k.id_kategori WHERE b.id_buku = '$id_buku'";
$hasil = mysqli_query($conn, $query);
if($hasil && mysqli_num_rows($hasil) > 0){
    $buku = mysqli_fetch_assoc($hasil);
} else {
    header("Location: ../dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
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
        <h3>Edit Buku</h3>
        <form action="../auth/update_buku.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id_buku" name="id_buku" value="<?php echo $buku['id_buku']; ?>">
            <div class="form-group">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?php echo $buku['judul_buku']; ?>" required>
            </div>
            <div class="form-group">
                <label for="id_kategori">Kategori</label>
                <select class="form-control" id="id_kategori" name="id_kategori" required>
                    <?php
                    $query = "SELECT * FROM kategori_buku";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $selected = ($row['id_kategori'] == $buku['id_kategori']) ? 'selected' : '';
                        echo "<option value='" . $row['id_kategori'] . "' $selected>" . $row['nama_kategori'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?php echo $buku['pengarang']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?php echo $buku['tahun_terbit']; ?>" required>
            </div>
            <div class="form-group">
                <label for="cover_buku">Cover Buku</label><br>
                <img src="../assets/images/<?php echo $buku['cover_buku']; ?>" alt="Cover Buku" width="100">
                <input type="file" class="form-control-file" id="cover_buku" name="cover_buku" value="<?php echo $buku['cover_buku']; ?>" accept=".jpg,.png,.jpeg">
            </div>
            <button type="submit" class="btn btn-primary">Update Buku</button>
        </form>
    </div>
</body>
</html>