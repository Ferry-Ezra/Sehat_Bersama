<?php
// Include your database connection file here
include '../koneksi.php'; // Ubah sesuai dengan nama file koneksi Anda

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nama = $_POST["nama"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $alamat = $_POST["alamat"];
    $jenis_kelamin = $_POST["jenis_kelamin"];

    // SQL query to insert data into database
    $sql = "INSERT INTO tb_pasien (Nama, Tanggal_lahir, Alamat, Jenis_kelamin) VALUES ('$nama', '$tanggal_lahir', '$alamat', '$jenis_kelamin')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        // Jika data berhasil ditambahkan, tampilkan alert dan alihkan ke halaman pasien.php
        echo "<script>
                alert('Data telah ditambahkan');
                window.location.href='pasien.php';
              </script>";
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>