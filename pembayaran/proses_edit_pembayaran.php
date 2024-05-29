<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu!'); window.location.href = 'login.php';</script>";
    exit();
}
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pembayaran = $_POST['id_pembayaran'];
    $ID_pasien = $_POST['ID_pasien'];
    $Jumlah = $_POST['Jumlah'];
    $Metode_pembayaran = $_POST['Metode_pembayaran'];
    $Keterangan = $_POST['Keterangan'];

    $sql = "UPDATE tb_pembayaran SET ID_pasien = ?, Jumlah = ?, Metode_pembayaran = ?, Keterangan = ? WHERE ID_pembayaran = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idssi", $ID_pasien, $Jumlah, $Metode_pembayaran, $Keterangan, $id_pembayaran);

    if ($stmt->execute()) {
        echo "<script>alert('Pembayaran berhasil diubah!'); window.location.href = 'pembayaran.php';</script>";
    } else {
        echo "<script>alert('Gagal mengubah pembayaran!'); window.location.href = 'edit_pembayaran.php?id=$id_pembayaran';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Metode tidak diizinkan!'); window.location.href = 'pembayaran.php';</script>";
}
?>
