<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="../assets/icon.png" />
    <link rel="stylesheet" href="#" />
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
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
          <a href="/admin.html">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="/pasien/pasien.html" class="active">
            <i class="bx bx-box"></i>
            <span class="links_name">Pasien</span>
          </a>
        </li>
        <li>
          <a href="/pembayaran/pembayaran.html">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Pembayaran</span>
          </a>
        </li>
        <li>
          <a href="#">
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
        <h3>Input Pasien</h3>
        <div class="form-login">
          <form action="">
            <label for="kategori">kategori</label>
            <input
              class="input"
              type="text"
              name="kategori"
              id="kategori"
              placeholder="kategori "
            />
            <label for="harga">harga</label>
            <input
              class="input"
              type="text"
              name="harga"
              id="harga"
              placeholder="harga"
            />
            <label for="Deskripsi">Deskripsi</label>
            <input
              class="input"
              type="text"
              name="Deskripsi"
              id="Deskripsi"
              placeholder="Deskripsi"
            />
            <label for="Foto">Foto</label>
            <input
              type="file"
              name="Foto"
              id="Foto"
              style="margin-bottom: 20px"
            />
            <button type="submit" class="btn btn-simpan" name="simpan">Simpan</button>
          </form>
        </div>
      </div>
    </section>
    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en" dir="ltr">
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
    <title>Sehat Bersama</title>
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bx-category"></i>
        <span class="logo_name">Sehat Bersama</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="../admin.html" class="active">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="../categories/categories.html">
            <i class="bx bx-box"></i>
            <span class="links_name">Pasien</span>
          </a>
        </li>
        <li>
          <a href="../transaction/transaction.html">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Pembayaran</span>
          </a>
        </li>
        <li>
          <a href="#">
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
          <span class="admin_name">Sehat Bersama</span>
        </div>
      </nav>
      <div class="home-content">
        <h3>Input Categories</h3>
        <div class="form-login">
          <form action="">
            <label for="kategori">kategori</label>
            <input
              class="input"
              type="text"
              name="kategori"
              id="kategori"
              placeholder="kategori"
            />
            <label for="categories">pembayaran</label>
            <input
              class="input"
              type="text"
              name="pembayaran"
              id="pembayaran"
              placeholder="pembayaran"
            />
            <label for="categories">Deskripsi</label>
            <input
              class="input"
              type="text"
              name="Deskripsi"
              id="Deskripsi"
              placeholder="Deskripsi"
            />
            <label for="Foto">Foto</label>
            <input
              type="file"
              name="Foto"
              id="Foto"
              style="margin-bottom: 20px"
            />
            <button type="submit" class="btn btn-simpan" name="simpan">Simpan</button>
          </form>
        </div>
      </div>
    </section>
  </body>
</html>
