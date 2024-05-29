<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] == null) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/icon.png">
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehat Bersama</title>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-category"></i>
            <span class="logo_name">Sehat Bersama</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#" class="active">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="pasien/pasien.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Pasien</span>
                </a>
            </li>
            <li>
                <a href="pembayaran/pembayaran.php">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Pembayaran</span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
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
            <h1>Selamat Datang Admin!!!!</h1>

            <!-- Widget Box Informasi Pembayaran -->
            <div class="widget-box">
                <h3>Informasi Total Data</h3>
                <div class="widget-content">
                    <?php
                    include 'koneksi.php';
                    $sql = "SELECT COUNT(*) as total_pembayaran, SUM(Jumlah) as total_jumlah FROM tb_pembayaran";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<p>Total Pembayaran: " . $row["total_pembayaran"] . "</p>";
                        echo "<p>Total Jumlah obat: " . $row["total_jumlah"] . "</p>";
                    } else {
                        echo "<p>Tidak ada data pembayaran</p>";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
            <style>
                /* Gaya umum untuk widget box */
                .widget-box {
                    border: 1px solid #ddd;
                    border-radius: 8px;
                    padding: 16px;
                    margin: 16px 0;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    background-color: #fff;
                }

                /* Gaya untuk judul widget */
                .widget-box h3 {
                    font-size: 20px;
                    margin-bottom: 16px;
                    color: #333;
                    border-bottom: 2px solid #007BFF;
                    padding-bottom: 8px;
                }

                /* Gaya untuk konten widget */
                .widget-content {
                    font-size: 16px;
                    color: #555;
                }

                /* Gaya untuk paragraf dalam konten widget */
                .widget-content p {
                    margin: 8px 0;
                    line-height: 1.6;
                }

                /* Gaya responsif untuk widget box */
                @media (max-width: 768px) {
                    .widget-box {
                        padding: 12px;
                    }

                    .widget-box h3 {
                        font-size: 18px;
                    }

                    .widget-content {
                        font-size: 14px;
                    }
                }
            </style>
        </div>
    </section>

    <script>
        // Logout function
        function logout() {
            alert("You have been logged out.");
            window.location.href = "login.php";
        }
    </script>
</body>

</html>