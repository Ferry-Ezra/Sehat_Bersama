<?php
include '../koneksi.php'; // Menghubungkan ke database

if (isset($_GET['id'])) {
    $id_pasien = $_GET['id'];

    // Query untuk mendapatkan data pasien berdasarkan ID
    $sql = "SELECT * FROM tb_pasien WHERE ID_pasien = $id_pasien";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<script>alert('Data tidak ditemukan'); window.location = 'pasien.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location = 'pasien.php';</script>";
    exit();
}

$conn->close();
?>

<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] == null) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="../assets/icon.png" />
    <link rel="stylesheet" href="../css/admin.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sehat Bersama - Tambah Data Pasien</title>
</head>

<body>
    <!-- navbar -->
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
                <a href="pasien.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Pasien</span>
                </a>
            </li>
            <li>
                <a href="../pembayaran/pembayaran.php">
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
        <!-- end -->

        <div class="home-content">
            <h3>Edit Data Pasien</h3>
            <div class="form-login">
                <form action="pasien-update.php" method="post">
                    <input type="hidden" name="id_pasien" value="<?php echo $row['ID_pasien']; ?>" />
                    <label for="nama">Nama</label>
                    <input class="input" type="text" name="nama" id="nama" value="<?php echo $row['Nama']; ?>"
                        required />
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input class="input" type="date" name="tanggal_lahir" id="tanggal_lahir"
                        value="<?php echo $row['Tanggal_lahir']; ?>" required />
                    <label for="alamat">Alamat</label>
                    <input class="input" type="text" name="alamat" id="alamat" value="<?php echo $row['Alamat']; ?>"
                        required />
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="input" name="jenis_kelamin" id="jenis_kelamin" required>
                        <option value="Laki-laki" <?php if ($row['Jenis_kelamin'] == 'Laki-laki')
                            echo 'selected'; ?>>
                            Laki-laki</option>
                        <option value="Perempuan" <?php if ($row['Jenis_kelamin'] == 'Perempuan')
                            echo 'selected'; ?>>
                            Perempuan</option>
                    </select>
                    <button type="submit" class="btn btn-simpan" name="submit">Simpan</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>