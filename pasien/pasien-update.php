<?php
include '../koneksi.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pasien = $_POST['id_pasien'];
    $nama = $_POST["nama"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $alamat = $_POST["alamat"];
    $jenis_kelamin = $_POST["jenis_kelamin"];

    // Query untuk memperbarui data pasien
    $sql = "UPDATE tb_pasien SET Nama='$nama', Tanggal_lahir='$tanggal_lahir', Alamat='$alamat', Jenis_kelamin='$jenis_kelamin' WHERE ID_pasien=$id_pasien";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data pasien berhasil diperbarui'); window.location = 'pasien.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>