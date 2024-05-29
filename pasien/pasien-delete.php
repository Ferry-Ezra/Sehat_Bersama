<?php
include '../koneksi.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pasien = $_POST['id_pasien'];

    // Query untuk menghapus data pasien berdasarkan ID
    $sql = "DELETE FROM tb_pasien WHERE ID_pasien = $id_pasien";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data pasien berhasil dihapus'); window.location = 'pasien.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>