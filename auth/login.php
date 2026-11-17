<?php
$status = $_GET['status'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
</head>
<body>
    <div class="container-fluid form-container">
        <h2>Login</h2>
        <?php
        if ($status === 'regis-success') {
            echo '<div class="alert alert-success">Registration successful! Please log in.</div>';
        } elseif ($status === 'username-false') {
            echo '<div class="alert alert-error">Invalid username. Please try again.</div>';
        } elseif ($status === 'password-false') {
            echo '<div class="alert alert-error">Incorrect password. Please try again.</div>';
        } elseif  ($status === 'logout-success') {
            echo '<div class="alert alert-success">You have been logged out successfully.</div>';
        }
        ?>
        <form action="proses_login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="button">Login</button>
            <a class="register-link" href="registrasi.php">Register</a>
        </form>
    </div>
</body>
</html>