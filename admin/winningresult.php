<?php
include('session.php');
include('header.php');
include('dbcon.php');
?>
</head>
<style>
body {
  background-color: #f9f9f9;
}
.wrapper {
  max-width: 1500px;
  margin: auto;
}
.chart-wrapper {
  background: #fff;
  border-radius: 12px;
  padding: 30px;
  margin: 30px auto;
  max-width: 1200px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.5);
}
.chart-wrapper h2 {
  color: #000;
  text-align: center;
  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 2px solid #ddd;
  font-weight: bold;
}
.chart-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
  gap: 30px;
}
.chart-item {
  background: #fff;
  border-radius: 8px;
  padding: 15px 10px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.12);
  display: flex;
  flex-direction: column;
  align-items: center;
  height: 350px;
  justify-content: space-between;
}
.chart-item-content {
  display: flex;
  flex-direction: column;
  align-items: center;
  flex-grow: 1;
}
.bar-container {
  position: relative;
  height: 160px;
  width: 30px;
  background-color: rgba(0, 0, 0, 0.05);
  display: flex;
  align-items: flex-end;
  justify-content: center;
  border-radius: 5px;
  overflow: hidden;
}
.bar-fill {
  width: 100%;
  background-color: #196f38;
  border-radius: 5px 5px 0 0;
  z-index: 2;
}
.bar-line {
  position: absolute;
  left: 0;
  width: 100%;
  height: 1px;
  background-color: rgba(0, 0, 0, 0.2);
  z-index: 1;
}
.bar-line:nth-child(1) { bottom: 25%; }
.bar-line:nth-child(2) { bottom: 50%; }
.bar-line:nth-child(3) { bottom: 75%; }
.bar-line:nth-child(4) { bottom: 100%; }
.vote-label {
  margin-top: 6px;
  color: #000;
  font-size: 12px;
  font-weight: bold;
}
.chart-img {
  margin-top: 10px;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #000;
}
.chart-name {
  margin-top: 6px;
  color: #000;
  font-size: 13px;
  font-weight: bold;
  text-align: center;
}
.chart-pos {
  color: #333;
  font-size: 11px;
  text-align: center;
  font-weight: bold;
  margin-bottom: 6px;
}
.view-btn-container {
  margin-top: auto;
}
</style>
<body>
<?php include('nav_top.php'); ?>

<div class="wrapper">
  <div class="home_body">
    <?php include('homesidebar.php'); ?>

    <section style="margin-top: 20px;">
      <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" style="color: #000; border: none;">
          <i class="icon-table icon-large" style="margin-right: 8px;"></i> Admin Actions
          <span class="caret" style="border-top-color: #000; margin-left: 6px;"></span>
        </button>
        <ul class="dropdown-menu" style="background-color: #fff;">
          <li><a href="result.php" style="color: #000;">Election Result</a></li>
          <li><a href="winningresult.php" style="color: #000;">Winning Result</a></li>
          <li><a href="backupnreset.php" style="color: #000;">Backup and Reset</a></li>
          <li><a href="dashboard.php" style="color: #000;">Analytics</a></li>
        </ul>
      </div>
    </section>

    <div class="chart-wrapper">
      <h2>Winning Candidates (Per Position)</h2>
      <div class="chart-grid">
        <?php
        $positions_query = mysqli_query($conn, "SELECT DISTINCT Position FROM candidate ORDER BY Position ASC");
        $top_candidates = [];

        while ($pos_row = mysqli_fetch_assoc($positions_query)) {
            $position = $pos_row['Position'];
            $safe_position = mysqli_real_escape_string($conn, $position);
            $top_cand_query = mysqli_query($conn, "
                SELECT c.CandidateID, c.FirstName, c.LastName, c.Year, c.Position, c.Photo, c.Qualification, c.Party,
                (SELECT COUNT(*) FROM votes v WHERE v.CandidateID = c.CandidateID) AS vote_count
                FROM candidate c
                WHERE c.Position = '$safe_position'
                ORDER BY vote_count DESC, c.LastName ASC
                LIMIT 1
            ");
            if ($top_cand = mysqli_fetch_assoc($top_cand_query)) {
                $top_candidates[] = $top_cand;
            }
        }

        $max_votes = max(array_column($top_candidates, 'vote_count'));

        foreach ($top_candidates as $cand):
          $height_percent = ($cand['vote_count'] / $max_votes) * 100;
        ?>
        <div class="chart-item">
          <div class="chart-item-content">
            <div class="chart-pos"><?php echo $cand['Position']; ?></div>
            <div class="bar-container">
              <div class="bar-line"></div>
              <div class="bar-line"></div>
              <div class="bar-line"></div>
              <div class="bar-line"></div>
              <div class="bar-fill" style="height: <?php echo $height_percent; ?>%;"></div>
            </div>
            <div class="vote-label"><?php echo $cand['vote_count']; ?> votes</div>
            <img src="<?php echo $cand['Photo']; ?>" class="chart-img" alt="Candidate Photo">
            <div class="chart-name"><?php echo $cand['FirstName'] . ' ' . $cand['LastName']; ?></div>
          </div>
          <div class="view-btn-container">
            <a href="#view_<?php echo $cand['CandidateID']; ?>" data-toggle="modal" class="btn btn-info btn-xs">View</a>
          </div>
        </div>

     <!-- Modal -->
<div class="modal hide fade" id="view_<?php echo $cand['CandidateID']; ?>">
  <div class="modal-header" style="background-color: #fff; color: #000;">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Candidate Information</h3>
  </div>
  <div class="modal-body" style="background-color: #fff; color: 000; padding: 20px;">
    <div style="display: flex; flex-wrap: wrap; gap: 20px; align-items: flex-start;">
      <div style="flex: 0 0 180px; text-align: center;">
        <img src="<?php echo $cand['Photo']; ?>" alt="Photo"
             style="width: 100%; max-width: 180px; height: auto; border-radius: 10px; border: 3px solid white;">
        <p style="margin-top: 10px; font-weight: bold;"><?php echo $cand['FirstName'].' '.$cand['LastName']; ?></p>
      </div>
      <div style="flex: 1;">
        <p><strong>Position:</strong> <?php echo $cand['Position']; ?></p>
        <p><strong>Year:</strong> <?php echo $cand['Year']; ?></p>
        <p><strong>Party:</strong> <?php echo $cand['Party']; ?></p>
        <p><strong>Total Votes:</strong> <?php echo $cand['vote_count']; ?></p>
        <p><strong>Qualification:</strong><br><?php echo nl2br(htmlspecialchars($cand['Qualification'])); ?></p>
      </div>
    </div>
  </div>
  <div class="modal-footer" style="background-color: #fff;">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
  </div>
</div>

        <?php endforeach; ?>
      </div>
    </div>

    <?php include('footer.php'); ?>
  </div>
</div>
</body>
</html>
