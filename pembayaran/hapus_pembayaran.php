<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu!'); window.location.href = 'login.php';</script>";
    exit();
}
include '../koneksi.php';

if (isset($_POST['id_pembayaran'])) {
    $id_pembayaran = $_POST['id_pembayaran'];

    $sql = "DELETE FROM tb_pembayaran WHERE ID_pembayaran = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_pembayaran);

    if ($stmt->execute()) {
        echo "<script>alert('Pembayaran berhasil dihapus!'); window.location.href = 'pembayaran.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus pembayaran!'); window.location.href = 'pembayaran.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('ID pembayaran tidak ditemukan!'); window.location.href = 'pembayaran.php';</script>";
}

$conn->close();
?>
