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
    <title>Sehat Bersama</title>
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
                <a href="pasien.php" class="active">
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
            <h3>Data Pasien</h3>
            <button type="button" class="btn btn-tambah">
                <a href="pasien-add.php">Tambah Data</a>
            </button>
            <table class="table-data">
                <thead>
                    <tr>
                        <th scope="col" style="width: 20%">Nama</th>
                        <th scope="col" style="width: 20%">Tanggal Lahir</th>
                        <th scope="col" style="width: 30%">Alamat</th>
                        <th scope="col" style="width: 10%">Jenis Kelamin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';

                    $sql = "SELECT ID_pasien, Nama, Tanggal_lahir, Alamat, Jenis_kelamin FROM tb_pasien";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["Nama"] . "</td>";
                            echo "<td>" . $row["Tanggal_lahir"] . "</td>";
                            echo "<td>" . $row["Alamat"] . "</td>";
                            echo "<td>" . $row["Jenis_kelamin"] . "</td>";
                            echo '<td>
                <a href="pasien-edit.php?id=' . $row["ID_pasien"] . '" class="btn-edit">Edit</a>
                <form action="pasien-delete.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id_pasien" value="' . $row["ID_pasien"] . '">
                    <button type="submit" class="btn-delete" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Hapus</button>
                </form>
              </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No data found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>
