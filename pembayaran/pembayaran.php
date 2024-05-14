<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="../assets/icon.png" />
    <link rel="stylesheet" href="../css/admin.css" />
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catshop Admin | Transaction</title>
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
          <a href="/admin.php">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="/pasien/pasien.php">
            <i class="bx bx-box"></i>
            <span class="links_name">Pasien</span>
          </a>
        </li>
        <li>
          <a href="/pembayaran/pembayaran.php" class="active">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Pembayaran</span>
          </a>
        </li>
        <li>
          <a href="/index.php">
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
          <span class="admin_name">SeBer Admin</span>
        </div>
      </nav>
      <!-- end -->

      <div class="home-content">
        <h3>Pembayaran</h3>
        <table class="table-data">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Nama</th>
              <th>Jenis Penanganan</th>
              <th>Harga</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>19-04-2023</td>
              <td>Yogi Anggara</td>
              <td>ICU </td>
              <td>3000.000.000</td>
              <td>
                <p class="Sukses">Sukses</p>
              </td>
              <td>
                <button class="btn_detail" onclick="showDetails('19-04-2023', 'Yogi Anggara', 'Anggora', '3000.000.000', 'Sukses')"> Detail </button>               
              </td>
            </tr>
            <tr>
                <td>22-05-2023</td>
                <td>Handoko</td>
                <td>Umum</td>
                <td>800.000.000</td>
                <td>
                  <p class="Sukses">Sukses</p>
                </td>
                <td>
                  <button class="btn_detail" onclick="showDetails('19-04-2023', 'Yogi Anggara', 'Anggora', '3000.000.000', 'Sukses')"> Detail </button>               
                </td>
              </tr>
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>
    </section>
  </body>
</html>
