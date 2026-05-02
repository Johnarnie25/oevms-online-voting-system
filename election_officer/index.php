<?php
session_start();
include('dbcon.php');


$errors = [];

if (isset($_POST['Login'])) {
    // Sanitize inputs
    $UserName = mysqli_real_escape_string($conn, $_POST['UserName']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);

    // Check user
    $login_query = mysqli_query($conn, "SELECT * FROM users WHERE UserName='$UserName' AND Password='$Password'");

    if ($login_query && mysqli_num_rows($login_query) > 0) {
        $row = mysqli_fetch_assoc($login_query);
        $f = $row['FirstName'];
        $l = $row['LastName'];

        $_SESSION['id'] = $row['User_id'];
        $_SESSION['User_Type'] = $row['User_Type'];
        $type = $row['User_Type'];

        mysqli_query($conn, "INSERT INTO history (data, action, date, user) VALUES ('$f $l', 'Login', NOW(), '$type')") or die(mysqli_error($conn));

      header("Location: home.php");
exit;

    } else {
        $errors['login'] = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
 <link rel="stylesheet" href="style.css">
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

        <h1 class="form-title">OEVS CSDL Election 2025</h1>


        <?php if (!empty($errors['login'])): ?>
            <div class="error-main" style="color: red; margin-bottom: 10px;">
                <?php echo $errors['login']; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="UserName" id="username" placeholder="Username" required />
            </div>

            <div class="input-group password">
                <i class="fas fa-lock"></i>
                <input type="password" name="Password" id="password" placeholder="Password" required />
                <i id="eye" class="fa fa-eye" onclick="togglePassword()" style="cursor:pointer;"></i>
            </div>
<p class="recover">
      <a href="recoverpassword.php" style="color: #196F38; font-weight: bold;">Recover Password</a>

      </p>
            <input type="submit" name="Login" class="btn" value="Sign In" />
        </form>
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
