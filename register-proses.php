<?php
include 'koneksi.php'; // Menghubungkan ke database

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Validasi data
    if (empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
        echo "<script>alert('Pastikan Anda Mengisi Semua Data'); window.location = 'register.php';</script>";
    } elseif ($password !== $confirmPassword) {
        echo "<script>alert('Password dan Konfirmasi Password tidak cocok'); window.location = 'register.php';</script>";
    } else {
        // Enkripsi password sebelum menyimpan ke database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk menyimpan data pengguna ke database
        $sql = "INSERT INTO tb_admin (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

        // Eksekusi query dan cek hasilnya
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registrasi berhasil'); window.location = 'login.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan, coba lagi'); window.location = 'register.php';</script>";
        }
    }
}
?>