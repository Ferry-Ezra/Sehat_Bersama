<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu!'); window.location.href = 'login.php';</script>";
    exit();
}
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id_pembayaran = $_GET['id'];

    $sql = "SELECT * FROM tb_pembayaran WHERE ID_pembayaran = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_pembayaran);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<script>alert('Data pembayaran tidak ditemukan!'); window.location.href = 'pembayaran.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID pembayaran tidak ditemukan!'); window.location.href = 'pembayaran.php';</script>";
    exit();
}

// Ambil daftar pasien untuk dropdown
$sql_pasien = "SELECT ID_pasien, Nama FROM tb_pasien";
$result_pasien = $conn->query($sql_pasien);
$conn->close();
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
    <title>Edit Pembayaran</title>
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
            <h3>Edit Pembayaran</h3>
            <form action="proses_edit_pembayaran.php" method="POST">
                <input type="hidden" name="id_pembayaran" value="<?php echo $row['ID_pembayaran']; ?>">
                <label for="pasien">Pilih Pasien:</label>
                <select name="ID_pasien" id="pasien" required>
                    <?php
                    if ($result_pasien->num_rows > 0) {
                        while ($row_pasien = $result_pasien->fetch_assoc()) {
                            $selected = ($row['ID_pasien'] == $row_pasien['ID_pasien']) ? "selected" : "";
                            echo "<option value='" . $row_pasien['ID_pasien'] . "' $selected>" . $row_pasien['Nama'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <br>
                <label for="jumlah">Jumlah:</label>
                <input type="number" name="Jumlah" id="jumlah" value="<?php echo $row['Jumlah']; ?>" required>
                <br>
                <label for="metode">Metode Pembayaran:</label>
                <input type="text" name="Metode_pembayaran" id="metode" value="<?php echo $row['Metode_pembayaran']; ?>" required>
                <br>
                <label for="keterangan">Keterangan:</label>
                <input type="text" name="Keterangan" id="keterangan" value="<?php echo $row['Keterangan']; ?>" required>
                <br>
                <button type="submit">Simpan Perubahan</button>
            </form>
        </div>
    </section>
</body>
</html>
                    