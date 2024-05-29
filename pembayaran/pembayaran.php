<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="../assets/icon.png" />
    <link rel="stylesheet" href="../css/admin.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SEHAT BERSAMA Admin | Transaction</title>
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
                <a href="../pasien/pasien.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Pasien</span>
                </a>
            </li>
            <li>
                <a href="pembayaran.php" class="active">
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
            <h3>Pembayaran</h3>
            <br>    
            <a href="tambah_pembayaran.php" class="btn btn-tambah">Tambah Pembayaran</a>
            <br><br> <!-- Menambahkan dua baris baru di sini -->
            <table class="table-data">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Metode Pembayaran</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $sql = "SELECT p.ID_pembayaran, p.Tanggal_pembayaran, ps.Nama, p.Jumlah, p.Metode_pembayaran, p.Keterangan
                            FROM tb_pembayaran p
                            JOIN tb_pasien ps ON p.ID_pasien = ps.ID_pasien";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["Tanggal_pembayaran"] . "</td>";
                            echo "<td>" . $row["Nama"] . "</td>";
                            echo "<td>" . $row["Jumlah"] . "</td>";
                            echo "<td>" . $row["Metode_pembayaran"] . "</td>";
                            echo "<td>" . $row["Keterangan"] . "</td>";
                            echo '<td>
                                    <a href="edit_pembayaran.php?id=' . $row["ID_pembayaran"] . '" class="btn_edit">Edit</a>
                                    <form action="hapus_pembayaran.php" method="POST" style="display:inline;">
                                          <input type="hidden" name="id_pembayaran" value="' . $row["ID_pembayaran"] . '">
                                          <button type="submit" class="btn-delete" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Hapus</button>
                                    </form>
                                </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No data found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <br>
            <a href="cetak_pembayaran.php" class="btn">Cetak PDF</a>
        </div>
    </section>
</body>
</html>
