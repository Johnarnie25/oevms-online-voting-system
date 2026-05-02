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

			<?php
// Fetch data for charts

// 1. Total candidates per position
$candidates_per_position = [];
$res = mysqli_query($conn, "SELECT Position, COUNT(*) as total FROM candidate GROUP BY Position");
while ($row = mysqli_fetch_assoc($res)) {
    $candidates_per_position[$row['Position']] = (int)$row['total'];
}

// 2. Total voted vs unvoted
// Assuming 'Status' in voters table shows voting status: e.g., 'Voted' or 'Unvoted' (adjust if different)
$res = mysqli_query($conn, "SELECT Status, COUNT(*) as total FROM voters GROUP BY Status");
$voted_counts = ['Voted' => 0, 'Unvoted' => 0];
while ($row = mysqli_fetch_assoc($res)) {
    $voted_counts[$row['Status']] = (int)$row['total'];
}

// 3. Total verified vs unverified voters
$res = mysqli_query($conn, "SELECT Verified, COUNT(*) as total FROM voters GROUP BY Verified");
$verified_counts = ['Verified' => 0, 'Not Verified' => 0];
while ($row = mysqli_fetch_assoc($res)) {
    $verified_counts[$row['Verified']] = (int)$row['total'];
}

// 4. Highest votes per position with candidate info
$highest_votes_per_position = [];

$query = "
SELECT 
    c.Position,
    c.FirstName,
    c.LastName,
    v.votes AS candidate_votes,
    pos_totals.total_votes_per_position
FROM candidate c
JOIN votes v ON c.CandidateID = v.CandidateID
JOIN (
    SELECT Position, MAX(votes) AS max_votes
    FROM candidate c2
    JOIN votes v2 ON c2.CandidateID = v2.CandidateID
    GROUP BY Position
) max_votes_table ON c.Position = max_votes_table.Position AND v.votes = max_votes_table.max_votes
JOIN (
    SELECT Position, SUM(votes) AS total_votes_per_position
    FROM candidate c3
    JOIN votes v3 ON c3.CandidateID = v3.CandidateID
    GROUP BY Position
) pos_totals ON c.Position = pos_totals.Position
ORDER BY c.Position
";

$res = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($res)) {
    $highest_votes_per_position[] = [
        'Position' => $row['Position'],
        'FirstName' => $row['FirstName'],
        'LastName' => $row['LastName'],
        'Votes' => (int)$row['candidate_votes'],
        'TotalVotesPerPosition' => (int)$row['total_votes_per_position']
    ];
}


?>

<!-- Include Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
.chart-container {
  display: flex;
  gap: 50px; /* space between charts */
  flex-wrap: wrap;
  margin-top: 30px;
  margin-bottom: 30px;
}

/* Common styles for all chart boxes */
.chart-box {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  flex: 1 1 300px; /* fallback minimum width */
  box-shadow: 0 0 10px #000;
  color: #fff;
}

/* Chart titles */
.chart-box h3 {
  border-bottom: 3px solid #fff;
  cursor: pointer;
  transition: color 0.3s ease, border-color 0.3s ease;
  padding-bottom: 8px;
  margin-bottom: 15px;
}

.chart-box h3:hover {
  color: #ffd400;
  border-bottom-color: #ffd400;
}

/* Specific chart box styles */
.verified-voters,
.voted-unvoted {
  width: calc(70% - 25px); /* 2 charts per row with gap */
}

.total-candidates {
  width: 100%; /* Full width for landscape chart */
}

/* Canvas size control */
canvas {
  width: 100% !important;
  height: 400px !important;
  display: block;
}

/* Optional: different height for landscape chart */
.total-candidates canvas {
  height: 400px !important; /* taller for landscape */
}

  
</style>

<div class="chart-container">
 
  <!-- Chart 1: Total Candidates per Position -->

  <!-- Chart 2: Total Voted vs Unvoted -->
   <div class="chart-box voted-unvoted">
    <h3 style="color:#000; border-bottom: 3px solid #000; cursor:pointer; transition: color 0.3s ease, border-color 0.3s ease;"
    onmouseover="this.style.color='#196f38'; this.style.borderBottomColor='#196f38';"
    onmouseout="this.style.color='#000'; this.style.borderBottomColor='#000';">
  Total Voted And Unvoted
</h3>
    <canvas id="votedChart" width="200" height="200"></canvas>

  </div>

  <!-- Chart 3: Verified vs Unverified -->
   <div class="chart-box total-candidates">
     <h3 style="color:#000; border-bottom: 3px solid #000; cursor:pointer; transition: color 0.3s ease, border-color 0.3s ease;"
     onmouseover="this.style.color='#196f38'; this.style.borderBottomColor='#196f38';"
     onmouseout="this.style.color='#000'; this.style.borderBottomColor='#000';">
  Total Candidates
</h3>
    <canvas id="candidatesChart"></canvas>
  </div>

 

</div>



<script>
const candidatesPerPosition = <?php echo json_encode($candidates_per_position); ?>;
const votedCounts = <?php echo json_encode($voted_counts); ?>;

// Chart 1: Total Candidates per Position (Vertical)
new Chart(document.getElementById('candidatesChart').getContext('2d'), {
  type: 'bar',
  data: {
    labels: Object.keys(candidatesPerPosition),
    datasets: [{
      label: 'Candidates',
      data: Object.values(candidatesPerPosition),
      backgroundColor: '#196F38'
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      x: {
        ticks: { color: '#000', font: { size: 12 } },
        grid: { color: '#ccc' }
      },
      y: {
        beginAtZero: true,
        ticks: { color: '#000', font: { size: 12 } },
        grid: { color: '#ccc' }
      }
    },
    plugins: {
      legend: {
        labels: { color: '#000', font: { size: 12 } }
      }
    }
  }
});

// Chart 2: Voted vs Unvoted (Vertical Bar)
new Chart(document.getElementById('votedChart').getContext('2d'), {
  type: 'bar',
  data: {
    labels: ['Voted', 'Unvoted'],
    datasets: [{
      label: 'Voters',
      data: [votedCounts.Voted || 0, votedCounts.Unvoted || 0],
      backgroundColor: ['#196F38', '#000']
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      x: {
        ticks: { color: '#000', font: { size: 12 } },
        grid: { color: '#ccc' }
      },
      y: {
        beginAtZero: true,
        ticks: { color: '#000', font: { size: 12 } },
        grid: { color: '#ccc' }
      }
    },
    plugins: {
      legend: {
        labels: { color: '#000', font: { size: 12 } }
      }
    }
  }
});
</script>



  


	</div>
	<?php include('footer.php')?>	
</div>
</div>
</body>
</html>
