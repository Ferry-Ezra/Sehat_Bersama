<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">k
</head>
<body>
    <nav>
        <img src="assets/image/logo.png" alt="logo" width="10%" />
        <h1>SEHAT BERSAMA</h1>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <!-- Add Logout button -->
            <li><a href="#" onclick="confirmLogout()">Logout</a></li>
        </ul>
    </nav>
    <p>
        "Sehat Bersama" adalah sebuah aplikasi platform layanan kesehatan yang telah dibuat untuk memberikan solusi terintegrasi bagi pengguna dalam mengelola kesehatan mereka. Aplikasi ini menawarkan berbagai fitur dan layanan yang dirancang untuk memudahkan pengguna dalam mendapatkan perawatan kesehatan yang mereka butuhkan, di mana pun dan kapan pun.
    </p>
    <h2 style="text-align: center">SEHAT BERSAMA</h2>
    <!-- Carousel -->
    <div class="carousel" id="carousel">
        <div class="carousel-inner">
            <div class="carousel-item">
                <img src="index/heart.jpg" alt="slide1" />
            </div>
            <div class="carousel-item">
                <img src="assets/image/logo.png" alt="slide2" />
            </div>
        </div>
        <!-- Navigation -->
        <div class="carousel-navigation">
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>
    <!-- End Carousel -->

    <!-- Script for logout function and confirmation -->
    <script>
        // Carousel
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("carousel-item");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1;
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Function to confirm logout
        function confirmLogout() {
            if (confirm("Apakah Anda yakin ingin keluar?")) {
                logout();
            }
        }
    </script>
</body>
</html>
