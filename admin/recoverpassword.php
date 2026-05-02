<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$success = $_SESSION['success'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Recover Password</title>
  <link rel="stylesheet" href="style.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
 
</head>
<body>
<div class="wrapper">

    <!-- Left Side: Logo and Info -->
    <div class="left-side">
      <img src="images/au.png" alt="AU Logo" class="au-logo">
      <h2>Araullo University</h2>
      <p>Maharlika Highway, Brgy. Bitas,<br>Cabanatuan City, 3100 Nueva Ecija, Philippines</p>
    </div>

    <!-- Right Side: Login Form -->
    <div class="right-side">
      <div class="container" id="signIn">

        <!-- PHINMA Logo -->
        <div class="logo1-container" style="text-align: center; margin-bottom: 10px;">
          <img src="images/phinma.png" alt="Logo" class="logo" style="width: 300px; height: 100px; margin: 0 auto;">
        </div>


    <h1 class="form-title">Administrator Recover Password</h1>

    <?php if ($success): ?>
      <div class="success-main"><p><?= htmlspecialchars($success) ?></p></div>
    <?php endif; ?>

   <?php if (isset($errors['user_exist'])): ?>
  <div class="error-result"><p><?= htmlspecialchars($errors['user_exist']) ?></p></div>
<?php endif; ?>


    <form method="POST" action="recover_account1.php">
       <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="firstname" placeholder="First Name" required>
      </div>

       <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="lastname" placeholder="Last Name" required>
      </div>

      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="username" placeholder="Username" required>
      </div>


      <div class="input-group password">
        <i class="fas fa-lock"></i>
        <input type="password" id="password" name="password" placeholder="New Password" required>
        <i class="fa fa-eye" id="togglePassword1"></i>
      </div>

      <div class="input-group password">
        <i class="fas fa-lock"></i>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
        <i class="fa fa-eye" id="togglePassword2"></i>
      </div>
 <p class="recover">
            <a href="index.php" style="color: #196F38; font-weight: bold;">Sign In</a>
          </p>
      <input type="submit" class="btn" value="Recover" name="signup">
    </form>

    <div class="links">
     
    
    </div>
  </div>

  <script>
    const togglePassword1 = document.getElementById("togglePassword1");
    const passwordField1 = document.getElementById("password");

    togglePassword1.addEventListener("click", function () {
      const type = passwordField1.type === "password" ? "text" : "password";
      passwordField1.type = type;
      this.classList.toggle("fa-eye");
      this.classList.toggle("fa-eye-slash");
    });

    const togglePassword2 = document.getElementById("togglePassword2");
    const passwordField2 = document.getElementById("confirm_password");

    togglePassword2.addEventListener("click", function () {
      const type = passwordField2.type === "password" ? "text" : "password";
      passwordField2.type = type;
      this.classList.toggle("fa-eye");
      this.classList.toggle("fa-eye-slash");
    });
  </script>
</body>
</html>

<?php
unset($_SESSION['errors'], $_SESSION['success']);
session_write_close();
?>
