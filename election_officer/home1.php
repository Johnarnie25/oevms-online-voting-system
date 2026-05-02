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
  <?php include('homesidebar.php'); ?>           <!-- 🔹 Navbar -->

	<!-- Bootstrap CSS & JS (required for dropdown to work) -->


<!-- Dropdown Menu Section -->
<section style="margin-top: 20px;">
  <div class="dropdown">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"
  #000; border: none;>
  <i class="icon-table icon-large" style="margin-right: 8px;"></i> Admin Actions
  <span class="caret" style="border-top-color: #000; margin-left: 6px;"></span>
</button>

    <ul class="dropdown-menu" style="background-color: #fff;">
      <li>
        <a href="result.php" style="color: #000;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#000'">
          <i class="icon-table icon-large" style="margin-right: 8px;"></i> Election Result
        </a>
      </li>   
      <li>
        <a href="dashboard.php" style="color: #000;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#000'">
          <i class="icon-table icon-large" style="margin-right: 8px;"></i> Analytics
        </a>
      </li>
    </ul>
  </div>
</section>
	<div id="element" class="hero-body">
	  <div class="thumbnail_gallery">
                <h2>Phinma Araullo University</h2>
				<p><font color="black">Click the image to view more...</font></p>
				<div id="myGallery" class="spacegallery">
					<img src="images/1.png" alt="" />
					<img src="images/2.png" alt="" />
					<img src="images/3.png" alt="" />
					<img src="images/4.png" alt="" />
					<img src="images/5.png" alt="" />
					<img src="images/6.png" alt="" />
					<img src="images/7.png" alt="" />

            </div>
			</div>
			  <div class="thumbnail_mission">
			  <h2>Mission</h2>
			  <p>"To make lives better through education"</p>
			   <a class="btn btn-info" data-toggle="modal" href="#mission"><i class="icon-list-alt icon-large"></i>&nbsp;Read More</a>
			   	<div class="modal hide fade" id="mission">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">�</button>
	    <h3> </h3>
	  </div>
	  <div class="modal-body">
	   <h2>About Phinma Education</h2>
<p><font color="black">
For more than a decade, PHINMA built its reputation on transforming existing educational institutions to better serve Filipino students. PHINMA Education begins this process by strategically selecting a school from a key growth area and thoroughly transforming its academics, operations, and student community in order to ensure success for Filipino youth coming from low-income families.
</p>	  	 
	  </div>
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">Close</a>
	  
		</div>
		</div>
			   
			  </div>
			  
			   <div class="thumbnail_vission">
			   <h2>Vision</h2><p>Phinma Education</p>
			  <p>"We envision a PHINMA Araullo University that is a dynamic institution of learning"
			  </p>
			  <a class="btn btn-info" data-toggle="modal" href="#read_objectives"><i class="icon-list-alt icon-large"></i>&nbsp;Read More</a>
			  
			  	<div class="modal hide fade" id="read_objectives">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">�</button>
	    <h3> Fulfilling our mission through education</h3>
	  </div>
	  <div class="modal-body">
	  <p><font color="black">Overall enrollment figures in the country have always been high. Despite this, attrition rates remained high and consistent. Out of four students who enter first grade, only one will go on to finish a tertiary degree. Learning about these statistics led PHINMA’s leaders to realize that they could fulfill their mission by helping improve the country’s state of education.

An innovative Philippine business institution, PHINMA always looks for ways to help Filipinos attain better lives. In 2004, they realized that investing in education was key to fully accomplishing their mission. With this in mind, they entered the education field to introduce reforms and innovations. Hence, PHINMA Education was born.
	 </p>
	 </div>
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">Close</a>

		</div>
		</div>
			  </div>
			
	</div>
	<?php include('footer.php')?>	
</div>
</div>
</body>
</html>
