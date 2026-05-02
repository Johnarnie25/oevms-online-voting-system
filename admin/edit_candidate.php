<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('session.php');
include('header.php');
include('dbcon.php');

$get_id=$_GET['id'];
?>
</head>
<body>
<?php include('nav_top.php'); ?>
<div class="wrapper">
<div class="home_body">
<?php include('menusidebar.php'); ?>
<section style="margin-top: 20px;">
 <section style="margin-top: 20px;">
  <div class="dropdown">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"
  #000; border: none;>
  <i class="icon-table icon-large" style="margin-right: 8px;"></i> Filter By Position
  <span class="caret" style="border-top-color: #000; margin-left: 6px;"></span>
</button>

    <ul class="dropdown-menu" style="background-color: #fff;">
      <li><a href="candidate_list.php" style="color: #000;">All</a></li>
      <li><a href="President.php" style="color: #000;">President</a></li>
      <li><a href="Vice-President.php" style="color: #000;">Vice-President</a></li>
      <li><a href="Governor.php" style="color: #000;">Governor</a></li>
      <li><a href="Vice-Governor.php" style="color: #000;">Vice-Governor</a></li>
      <li><a href="Secretary.php" style="color: #000;">Secretary</a></li>
      <li><a href="Treasurer.php" style="color: #000;">Treasurer</a></li>
      <li><a href="Socialmediaofficer.php" style="color: #000;">Social-Media Officer</a></li>
      <li><a href="Representative.php" style="color: #000;">Representative</a></li>
    </ul>
  </div>
</section>
	
	
	<div id="element" class="hero-body">
	<?php 
	$result=mysqli_query($conn,"select * from candidate where CandidateID='$get_id'") or die(mysqli_error());
	$row=mysqli_fetch_array($result);
	?>
	<form method="POST"  class="form-horizontal" enctype="multipart/form-data">
	<input type="hidden" name="user_name" class="user_name" value="<?php echo $_SESSION['User_Type']; ?>"/>
    <fieldset>
    <legend><font color="white">Edit Candidate</font></legend>
	</br>
	<div class="candidate_margin">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter">
   
	<div class="control-group">
    <label class="control-label" for="input01">FirstName:</label>
    <div class="controls">
    <input type="text" name="rfirstname" class="rfirstname" value="<?php echo $row['FirstName']; ?>">
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">LastName:</label>
    <div class="controls">
    <input type="text" name="rlastname" class="rlastname" value="<?php echo $row['LastName']; ?>">
    </div>
    </div>
	
		
	<div class="control-group">
    <label class="control-label" for="input01">MiddleName:</label>
    <div class="controls">
    <input type="text" name="rname" class="rname" value="<?php echo $row['MiddleName']; ?>">
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">Gender:</label>
    <div class="controls">
   <select name="rgender" class="rgender" id="span2">
   <option><?php echo $row['Gender']; ?></option>
	<option>Male</option>
	<option>FeMale</option>
	
	</select>
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">Year Level:</label>
    <div class="controls">
   <select name="ryear" class="ryear" id="span2">
     <option><?php echo $row['Year']; ?></option>
	<option>1st year</option>
	<option>2nd year</option>
	<option>3rd year</option>
	<option>4th year</option>
	</select>
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">Position:</label>
    <div class="controls">
   <select name="rposition" class="rposition" id="span90">
    <option><?php echo $row['Position']; ?></option>
		<option>President</option>
	<option>Vice-President</option>
	<option>Governor</option>
	<option>Vice-Governor</option>
	<option>Secretary</option>
	<option>Treasurer</option>
	<option>Social-Media Officer</option>
	<option>Representative</option>
	
	</select>
    </div>
    </div>
	
		<div class="control-group">
    <label class="control-label" for="input01">Party:</label>
    <div class="controls">
    <input type="text" name="party" class="party" value="<?php echo $row['Party']; ?>">
    </div>
    </div>
	
<div class="control-group">
    <label class="control-label" for="qualification">Qualification</label>
    <div class="controls">
        <textarea id="qualification" name="qualification" class="font" rows="5" cols="50" placeholder="Enter candidate qualification..."></textarea>
    </div>
</div>
	
	
	<div class="control-group">
    <div class="controls">
	<button class="btn btn-primary" name="save"><i class="icon-save icon-large"></i>Save</button>
    </div>
    </div>
	
    </fieldset>
    </form>
	
	</div>
	<?php include('footer.php')?>	
</div>
</div>
</div>
</body>
</html>


<?php
if (isset($_POST['save'])) {
    $user_name = $_POST['user_name'];

    $rfirstname = mysqli_real_escape_string($conn, $_POST['rfirstname']);
    $rlastname = mysqli_real_escape_string($conn, $_POST['rlastname']);
    $rgender = mysqli_real_escape_string($conn, $_POST['rgender']);
    $ryear = mysqli_real_escape_string($conn, $_POST['ryear']);
    $rposition = mysqli_real_escape_string($conn, $_POST['rposition']);
    $rmname = mysqli_real_escape_string($conn, $_POST['rname']);  // you used 'rname' for MiddleName
    $party = mysqli_real_escape_string($conn, $_POST['party']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);

    // Initialize $location to empty string
    $location = '';

    if (!empty($_FILES['image']['tmp_name'])) {
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name = basename($_FILES['image']['name']);
        $upload_dir = "upload/";
        $target_file = $upload_dir . $image_name;

        // Move the uploaded file (overwrite existing)
        if (move_uploaded_file($image_tmp_name, $target_file)) {
            $location = ", Photo = '" . mysqli_real_escape_string($conn, $target_file) . "'";
        } else {
            die("Failed to upload image.");
        }
    }

    // Build the UPDATE query including the qualification field
    $sql = "UPDATE candidate SET 
                FirstName = '$rfirstname', 
                LastName = '$rlastname', 
                Gender = '$rgender', 
                Year = '$ryear', 
                Position = '$rposition', 
                MiddleName = '$rmname', 
                Party = '$party', 
                Qualification = '$qualification' 
                $location
            WHERE CandidateID = '$get_id'";

  if (mysqli_query($conn, $sql)) {
    // Insert into history table
    $fullname = $rfirstname . " " . $rlastname;
    $action = "Edit Candidate";
    $stmt = $conn->prepare("INSERT INTO history (data, action, date, user) VALUES (?, ?, NOW(), ?)");
    if ($stmt) {
        $stmt->bind_param("sss", $fullname, $action, $user_name);
        $stmt->execute();
        $stmt->close();
    }

    // Debug
    // echo "Redirecting now...";
    header("Location: candidate_list.php");
    exit();
} else {
    die("Error updating candidate: " . mysqli_error($conn));
}

}
?>

	  