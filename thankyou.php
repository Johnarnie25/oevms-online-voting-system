<?php 
// ✅ Ensure session is started before anything else
session_start();
include('session.php');
include('dbcon.php');
include('header.php');

// ✅ Get session ID
$session_id = $_SESSION['id'] ?? null;

// ✅ Prevent proceeding without a session
if (!$session_id) {
    header("Location: index.php");
    exit;
}
?>

<link rel="stylesheet" type="text/css" href="admin/css/style.css" />

<script type="text/javascript">
  $(document).ready(function() {
    setTimeout(function() {
      window.location = 'index.php';
    }, 10000);  
  });
</script>

<script src="jquery.iphone-switch.js" type="text/javascript"></script>
</head>
<style>
  .thank_you1 {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh;
    text-align: center;
}

.thank-card {
    background-color: white;
    padding: 50px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    max-width: 700px;
    width: 90%;
}

.thank-card h2 {
    color: #196f38;
    margin-bottom: 10px;
    font-size: 28px;
}

.thank-card h3 {
    color: #444;
    font-size: 22px;
    margin-top: 10px;
}

.checkmark {
    font-size: 60px;
    color: green;
    margin-bottom: 20px;
}
  </style>
<body>

<?php include('nav_top.php'); ?>
<div class="wrapper">
<div class="home_body">
<?php include('homesidebar.php'); ?>

   <hr class="footer-line1">
  <?php 
  $result = mysqli_query($conn, "SELECT * FROM voters WHERE VoterID = '$session_id'") or die(mysqli_error($conn));
  $row = mysqli_fetch_array($result);
  ?>
 <div class="thank_you1">
  <div class="thank-card">
    <div class="checkmark">✔️</div>
    <h2>Thank You for Voting!</h2>
    <h3>You have successfully voted.</h3>
    <h3><strong><?php echo htmlspecialchars($row['FirstName'] . ' ' . $row['LastName']); ?></strong></h3>
  </div>
</div>

    <?php session_destroy(); ?>

  </div>
<div class="foot" style="margin-top: 40px;">
    <?php include('footer1.php'); ?>
</div>

</body>
</html>