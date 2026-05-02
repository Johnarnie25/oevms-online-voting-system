<?php
include('session.php');
include('header.php');
include('dbcon.php');
?>
</head>
<style>
.wrapper {
  max-width: 1500px;
}
h2 {
  text-align: center;
  color: #ffd400;
}
.chart-container {
  width: 1000px;
  height: 400px; /* taller for multiple bars */
  background-color: #fff;
  margin: 30px auto;
  padding: 30px;
  border-radius: 10px;
  color: white;
}
canvas {
  width: 100% !important;
  height: 100% !important;
}
.total-votes {
  color: #fff;
  font-weight: bold;
  text-align: center;
  margin-bottom: 10px;
}
.navbar ul.nav li {
  display: inline-block;
  margin-right: 10px;
}
button.custom-btn {
  background-color: #000;
  border: none;
  color: #fff;
  cursor: pointer;
  font-size: inherit;
  width: 150px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  transition: color 0.3s;
}
button.custom-btn i {
  transition: color 0.3s;
}
button.custom-btn:hover {
  color: #ffd400;
}
button.custom-btn:hover i {
  color: #ffd400;
}
</style>
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
        <a href="winningresult.php" style="color: #000;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#000'">
          <i class="icon-table icon-large" style="margin-right: 8px;"></i> Winning Result
        </a>
      </li>
      <li>
        <a href="backupnreset.php" style="color: #000;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#000'">
          <i class="icon-table icon-large" style="margin-right: 8px;"></i> Backup and Reset
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

      <!-- ✅ Backup & Restore Section -->
      <!-- ✅ Backup & Restore Section (Redesigned) -->
<div style="max-width: 800px; margin: 60px auto; padding: 30px; background-color:  #fff; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.5);">
  <h3 style="text-align: center; margin-bottom: 30px; color: #000;"> Backup &  Restore Options</h3>

  <!-- Backup Form -->
  <div style="background-color: #fff; padding: 20px; border-radius: 8px; margin-bottom: 20px; border-left: 6px solid #c9302c;">
    <h4 style="margin-bottom: 15px; color: #c9302c;"><i class="icon-save"></i> Create Backup & Reset</h4>
    <form method="post" action="reset.php" onsubmit="return confirm('Are you sure you want to reset all data of OEVS CSDL?');">
      <input
        type="text"
        name="custom_name"
        placeholder="Enter backup name"
        required
        style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc;"
      >
      <button
        type="submit"
        name="reset"
        class="btncolor"
        style="width: 100%; background-color: #c9302c; color: white; border: none; padding: 10px; border-radius: 5px; font-weight: bold;"
        onmouseover="this.style.backgroundColor='#000';"
        onmouseout="this.style.backgroundColor='#c9302c';"
      >
        <i class="icon-warning-sign"></i> Reset & Backup
      </button>
    </form>
  </div>

  <!-- Restore Form -->
  <div style="background-color: #fff; padding: 20px; border-radius: 8px; border-left: 6px solid #196F38;">
    <h4 style="margin-bottom: 15px; color: #196F38;"><i class="icon-refresh"></i> Restore From Backup</h4>
    <form method="post" action="restore_process.php" onsubmit="return confirm('Are you sure you want to restore this backup?');">
      <select
        name="backup_file"
        required
        style="width: 100%; padding: 0px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc;"
      >
        <option value="">-- Select backup file --</option>
        <?php
        $backupDir = __DIR__ . DIRECTORY_SEPARATOR . 'backup';
        $files = glob($backupDir . DIRECTORY_SEPARATOR . '*.sql');
        foreach ($files as $file) {
            $fileName = basename($file);
            echo "<option value=\"$fileName\">$fileName</option>";
        }
        ?>
      </select>
      <button
        type="submit"
        name="restore"
        class="btncolor"
        style="width: 100%; background-color: #196F38; color: #fff; border: none; padding: 10px; border-radius: 5px; font-weight: bold;"
        onmouseover="this.style.backgroundColor='#000';"
        onmouseout="this.style.backgroundColor='#196F38';"
      >
        <i class="icon-refresh"></i> Restore Selected Backup
      </button>
    </form>
  </div>
</div>


    <br />
    <?php include('footer.php'); ?>
  </div>
</div>
</body>
</html>
