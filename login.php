<?php
session_start();
include 'koneksi.php'; // Menghubungkan ke database

// Cek apakah user sudah login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        // Memeriksa apakah form sudah diisi
        echo "<script>alert('Isi semua data terlebih dahulu.');</script>";
    } else {
        // Query untuk mengambil data user dari database
        $sql = "SELECT * FROM tb_admin WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // Memeriksa apakah password cocok
            if (password_verify($password, $user['password'])) {
                // Jika cocok, set session dan cookie
                $_SESSION['username'] = $username;
                setcookie('username', $username, time() + (86400 * 30), '/');
                echo "<script>alert('Login berhasil!'); window.location.href = 'admin.php';</script>";
                exit();
            } else {
                echo "<script>alert('Password salah.'); window.location.href = 'login.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Username tidak ditemukan.'); window.location.href = 'login.php';</script>";
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>

<body>

    <header class="navbar">
        <div class="container">
            <h1>SEHAT BERSAMA</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="admin.php">Admin</a></li>
                    <li><a href="index.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form id="loginForm" action="login-proses.php" method="post">
                <div class="input-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <input type="submit" value="Login">
            </form>
            <p class="register-link">Do you have an account? <a href="register.php">Register</a></p>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; SEHAT BERSAMA MOJOKERTO</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const loginForm = document.getElementById('loginForm');
        });
    </script>

</body>

</html>