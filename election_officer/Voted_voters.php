<?php
include('session.php');
include('header.php');
include('dbcon.php');
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
      <li>
        <a href="voter_list.php" style="color: #000;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#000'">
          <i class="icon-table icon-large" style="margin-right: 8px;"></i> All
        </a>
      </li>
      <li>
        <a href="Voted_voters.php" style="color: #000;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#000'">
          <i class="icon-table icon-large" style="margin-right: 8px;"></i> Voted Voters
        </a>
      </li>
      <li>
        <a href="Unvoted_voters.php" style="color: #000;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#000'">
          <i class="icon-table icon-large" style="margin-right: 8px;"></i> UnVoted Voters
        </a>
      </li>
    </ul>
  </div>
</section>
</section>

<section>
	<div id="element" class="hero-body">
	
		    <div class="pagination">
    <ul>

    
  
   
 
  
    </ul>
    </div>
		<div class="excel_button">
			<form method="POST" action="excel_voted_voter.php">
	<button id="excel" class="btn btn-success" name="save"><i class="icon-download icon-large"></i>Download Excel File</button>
	</form>
	</div>
	<table class="users-table">


<div class="demo_jui">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="log" class="jtable">
	<thead>
<tr>
    <th>Date Voted</th>
    <th>Time Voted</th>
    <th>Room</th>
    <th>Phinma Email</th>
    <th>Student ID</th>
    <th>Year</th>
    <th>Status</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>

<?php $voter_query = mysqli_query($conn, "SELECT * FROM voters WHERE status='Voted'");
while ($voter_rows = mysqli_fetch_array($voter_query)) {
    $id = $voter_rows['VoterID'];
?>

<tr class="del<?php echo $id ?>">
    <td><?php echo $voter_rows['DateVoted']; ?></td>
    <td><?php echo $voter_rows['TimeVoted']; ?></td>
    <td><?php echo $voter_rows['Room']; ?></td>
    <td><?php echo $voter_rows['Username']; ?></td>
    <td><?php echo $voter_rows['SchoolID']; ?></td> <!-- Added School ID -->
    <td align="center"><?php echo $voter_rows['Year']; ?></td>
    <td align="center"><?php echo $voter_rows['Status']; ?></td>
    <td align="center">
      <a class="btn btn-danger1" id="<?php echo $id; ?>">
        <i class="icon-trash icon-large"></i>&nbsp;Delete
      </a>

      <input type="hidden" name="data_name" class="data_name<?php echo $id ?>" value="<?php echo $voter_rows['FirstName'] . " " . $voter_rows['LastName']; ?>"/>
      <input type="hidden" name="user_name" class="user_name" value="<?php echo $_SESSION['User_Type']; ?>"/>
    </td>
</tr>
<?php } ?>

			</tbody>
		</table>
	</div>
	
	
	<?php include('footer.php')?>
</div>
</div>

<input type="hidden" class="pc_date" name="pc_date"/>
<input type="hidden" class="pc_time" name="pc_time"/>
</body>
</html>

<script type="text/javascript">
	$(document).ready( function() {
	
	var myDate = new Date();
var pc_date = (myDate.getMonth()+1) + '/' + (myDate.getDate()) + '/' + myDate.getFullYear();
var pc_time = myDate.getHours()+':'+myDate.getMinutes()+':'+myDate.getSeconds();
jQuery(".pc_date").val(pc_date);
jQuery(".pc_time").val(pc_time);
	
	
	$('.btn-danger1').click( function() {
		
		var id = $(this).attr("id");
		var pc_date = $('.pc_date').val();
		var pc_time = $('.pc_time').val();
		var data_name = $('.data_name'+id).val();
		var user_name = $('.user_name').val();
		if(confirm("Are you sure you want to delete this Voter?")){
			
		
			$.ajax({
			type: "POST",
			url: "delete_voter.php",
			data: ({id: id,pc_time:pc_time,pc_date:pc_date,data_name:data_name,user_name:user_name}),
			cache: false,
			success: function(html){
			$(".del"+id).fadeOut('slow'); 
			} 
			}); 
			}else{
			return false;}
		});				
	});

</script>
