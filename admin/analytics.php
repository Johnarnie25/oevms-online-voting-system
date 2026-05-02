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
<?php include('homesidebar.php'); ?>
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
<!-- 📅 Calendar Section -->
<?php
$month = date('n');
$year = date('Y');
$today = date('j');
$first_day = mktime(0, 0, 0, $month, 1, $year);
$days_in_month = date('t', $first_day);
$start_day = date('w', $first_day);
$month_name = date('F', $first_day);
?>

<style>
  .calendar-wrapper {
    max-width: 600px;
    margin: 40px auto;
    padding: 25px;
    background-color: #fefefe;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .calendar-title {
    text-align: center;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 20px;
    color: #222;
  }

  .calendar {
    width: 100%;
    border-collapse: collapse;
  }

  .calendar th {
    background-color: #111;
    color: white;
    padding: 12px;
    font-size: 16px;
    border-radius: 8px 8px 0 0;
  }

  .calendar td {
    width: 14.28%;
    height: 70px;
    text-align: center;
    vertical-align: middle;
    font-size: 16px;
    color: #333;
    border: 1px solid #eee;
    transition: background-color 0.3s, color 0.3s;
    cursor: default;
    border-radius: 8px;
  }

  .calendar td:hover {
    background-color: #196f38;
  }

  .calendar .today {
    background-color: #196f38;
    color: #000;
    font-weight: bold;
    border: 2px solid #222;
    box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
  }
</style>

<div class="calendar-wrapper">
  <div class="calendar-title"><?php echo "$month_name $year"; ?></div>
  <table class="calendar">
    <tr>
      <th>Sun</th>
      <th>Mon</th>
      <th>Tue</th>
      <th>Wed</th>
      <th>Thu</th>
      <th>Fri</th>
      <th>Sat</th>
    </tr>
    <tr>
      <?php
      for ($i = 0; $i < $start_day; $i++) {
          echo "<td></td>";
      }

      for ($day = 1; $day <= $days_in_month; $day++) {
          $is_today = ($day == $today) ? 'today' : '';
          echo "<td class='$is_today'>$day</td>";

          if (($start_day + $day) % 7 == 0) {
              echo "</tr><tr>";
          }
      }

      $remaining = (7 - (($start_day + $days_in_month) % 7)) % 7;
      for ($i = 0; $i < $remaining; $i++) {
          echo "<td></td>";
      }
      ?>
    </tr>
  </table>
</div>

<?php include('footer.php'); ?>
</div>
</body>
</html>
