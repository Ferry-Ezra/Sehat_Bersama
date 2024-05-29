<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/register.css">
  <title>Register</title>
</head>

<body>
  <header class="navbar">
    <div class="container">
      <h1>Register</h1>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="admin.php">Admin</a></li>
          <li><a href="index.php">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="container">
    <div class="register-form">
      <h2>Register</h2>
      <form class="register-form" action="register-proses.php" method="post">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="password" name="confirm-password" placeholder="Confirm Password" required><br><br>
        <input type="submit" name="register" value="Register">
      </form>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      <p>&copy; SEHAT BERSAMA</p>
    </div>
  </footer>

</body>

</html>