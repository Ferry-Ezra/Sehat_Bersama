<?php
session_start();
include 'koneksi.php'; // Menghubungkan ke database

// Cek apakah user sudah login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        // Memeriksa apakah form sudah diisi
        echo "<script>alert('Isi semua data terlebih dahulu.'); window.location.href = 'login.php';</script>";
    } else {
        // Query untuk mengambil data user dari database
        $sql = "SELECT * FROM tb_admin WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

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