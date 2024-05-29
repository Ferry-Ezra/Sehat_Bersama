<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu!'); window.location.href = 'login.php';</script>";
    exit();
}
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../assets/icon.png">
    <link rel="stylesheet" href="../css/admin.css">
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembayaran</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-category"></i>
            <span class="logo_name">Sehat Bersama</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../admin.php">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../pasien/pasien.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Pasien</span>
                </a>
            </li>
            <li>
                <a href="pembayaran.php">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Pembayaran</span>
                </a>
            </li>
            <li>
                <a href="../logout.php">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
            </div>
            <div class="profile-details">
                <span class="admin_name">Admin</span>
            </div>
        </nav>
        <div class="home-content">
            <h3>Tambah Pembayaran</h3>
            <form action="proses_tambah_pembayaran.php" method="POST">
                <label for="pasien">Pilih Pasien:</label>
                <select name="ID_pasien" id="pasien" required>
                    <?php
                    $sql_pasien = "SELECT ID_pasien, Nama FROM tb_pasien";
                    $result_pasien = $conn->query($sql_pasien);
                    if ($result_pasien->num_rows > 0) {
                        while ($row_pasien = $result_pasien->fetch_assoc()) {
                            echo "<option value='" . $row_pasien['ID_pasien'] . "'>" . $row_pasien['Nama'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <br>
                <label for="jumlah">Jumlah Obat:</label>
                <input type="number" name="Jumlah" id="jumlah" required>
                <br>
                <label for="metode">Metode Pembayaran:</label>
                <select name="Metode_pembayaran" id="metode" required>
                    <option value="Cash">Cash</option>
                    <option value="Online">Online</option>
                </select>
                <br>
                <label for="keterangan">Keterangan:</label>
                <select name="Keterangan" id="keterangan" required>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                </select>
                <br>
                <button type="submit">Tambah Pembayaran</button>
            </form>
        </div>
    </section>
</body>
</html>
