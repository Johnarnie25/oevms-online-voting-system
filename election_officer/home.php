<?php
include('session.php');
include('header.php');
include('dbcon.php');
?>
<style>
  .main-flex-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 80px;
    flex-wrap: wrap;
  }

  .box-list-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .menu-box {
    background-color: #fff;
    width: 300px;
    height: 200px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    transition: 0.3s;
    cursor: pointer;
    padding: 0 20px;
    gap: 70px;
  }

  .menu-box:hover {
    background-color: #196f38;
    color: white;
    transform: scale(1.03);
  }

  .menu-box i {
    font-size: 80px;
    margin: 0;
  }

  .menu-box p {
    margin: 0;
    font-size: 30px;
    font-weight: bold;
  }

  .logo-container {
    text-align: center;
  }

  .logo-container img {
    max-width: 250px;
    height: auto;
    margin-bottom: 10px;
  }

  .logo-container p {
    font-size: 20px;
    font-weight: bold;
    color: #333;
    margin: 0;
  }

  @media screen and (max-width: 768px) {
    .main-flex-container {
      flex-direction: column;
      align-items: center;
    }

    .logo-container {
      margin-top: 40px;
    }
  }
</style>
</head>
<body>
<?php include('nav_top.php'); ?>
<div class="wrapper">
  <div class="home_body">

    <?php include('homesidebar1.php'); ?> <!-- 🔹 Sidebar -->

    <!-- 🔹 Box List and Logo Side by Side -->
    <div class="main-flex-container">
      <!-- Left: Boxes -->
      <div class="box-list-container">
        <div class="menu-box" onclick="window.location.href='home1.php';">
          <i class="icon-home"></i>
          <p>Home</p>
        </div>
        <div class="menu-box" onclick="window.location.href='voter_list.php';">
          <i class="icon-list-alt"></i>
          <p>Menu</p>
        </div>
      </div>

      <!-- Right: Logo with Text Below -->
      <div class="logo-container">
        <img src="images/au.png" alt="Logo">
        <p>Araullo University</p>

		
      </div>
    </div>

  </div>
  <?php include('footer.php')?>	
</div>
</body>
</html>
