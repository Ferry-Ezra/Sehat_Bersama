<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu!'); window.location.href = 'login.php';</script>";
    exit();
}
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID_pasien = $_POST['ID_pasien'];
    $Jumlah = $_POST['Jumlah'];
    $Metode_pembayaran = $_POST['Metode_pembayaran'];
    $Keterangan = $_POST['Keterangan'];

    $sql = "INSERT INTO tb_pembayaran (ID_pasien, Tanggal_pembayaran, Jumlah, Metode_pembayaran, Keterangan)
            VALUES ('$ID_pasien', NOW(), '$Jumlah', '$Metode_pembayaran', '$Keterangan')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pembayaran berhasil ditambahkan!'); window.location.href = 'pembayaran.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
