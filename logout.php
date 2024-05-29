<?php
session_start();

// Menghapus semua session
session_unset();
session_destroy();

// Menghapus cookie
setcookie('username', '', time() - 3600, '/');

// Redirect ke halaman login
echo "<script>alert('Logout berhasil!'); window.location.href = 'login.php';</script>";
exit();
?>