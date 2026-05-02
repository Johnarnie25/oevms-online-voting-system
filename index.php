<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | OEVS</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="wrapper">

    <!-- Left Side: Logo and Info -->
    <div class="left-side">
      <img src="pic/au.png" alt="AU Logo" class="au-logo">
      <h2>Araullo University</h2>
      <p>Maharlika Highway, Brgy. Bitas,<br>Cabanatuan City, 3100 Nueva Ecija, Philippines</p>
    </div>

    <!-- Right Side: Login Form -->
    <div class="right-side">
      <div class="container" id="signIn">

        <!-- PHINMA Logo -->
        <div class="logo1-container" style="text-align: center; margin-bottom: 10px;">
          <img src="pic/phinma.png" alt="Logo" class="logo" style="width: 300px; height: 100px; margin: 0 auto;">
        </div>

        <h1 class="form-title">OEVS VOTING 2025</h1>

        <!-- Display Login Error Message -->
        <?php if (!empty($_SESSION['login_error'])): ?>
          <div class="error-main">
            <p><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></p>
          </div>
        <?php endif; ?>

        <!-- Login Form (Now using only School ID and Password) -->
        <form method="POST" action="user_account.php">

          <div class="input-group">
            <i class="fas fa-id-card"></i>
            <input type="text" name="SchoolID" id="SchoolID" placeholder="AU School ID" required autocomplete="off">
          </div>

          <div class="input-group password">
            <i class="fas fa-lock"></i>
            <input type="password" name="Password" id="password" placeholder="Password" required>
            <i id="eye" class="fa fa-eye" onclick="togglePassword()"></i>
          </div>

          <p class="recover">
            <a href="recoverpassword.php" style="color: #196F38; font-weight: bold;">Recover Password</a>
          </p>

          <input type="submit" class="btn" value="Sign In" name="Login">
        </form>

        <div class="links">
         
        </div>

      </div>
    </div>

  </div>

  <script>
    function togglePassword() {
      let passwordField = document.getElementById("password");
      let eyeIcon = document.getElementById("eye");

      if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
      } else {
        passwordField.type = "password";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
      }
    }
  </script>
</body>
</html>
