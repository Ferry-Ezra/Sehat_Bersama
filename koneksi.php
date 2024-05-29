<?php
$servername = "localhost";
$username = "root"; // Ganti sesuai username database Anda
$password = ""; // Ganti sesuai password database Anda
$dbname = "sehatbersama"; // Ganti sesuai nama database Anda

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Mengecek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
