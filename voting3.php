<?php 
include('session.php');
include('dbcon.php');
include('header.php');
?>
<link rel="stylesheet" type="text/css" href="admin/css/style.css" />


<style>

.wrapper {
    max-width: 1500px;
    margin: auto;
}
.position-title {
    font-size: 20px;
    margin: 20px 0 10px 0;
    color: white;
    background: #196F38;
    padding: 10px 20px;
    border-radius: 5px;
    display: inline-block;
    text-align: center;
    position: relative;
}

.position-header {
    text-align: center;
    margin-bottom: 20px;
    position: relative;
}

.position-header::after {
    content: "";
    display: block;
    height: 2px;
    width: 100%;
    background-color: #ccc;
    position: absolute;
    bottom: -10px;
    left: 0;
}


.vote-box1 {
    background-color: #ffffff;
    padding: 30px;
    max-width: 1100px;
    margin: auto;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.5);
}
.carousel-container {
    position: relative;
    overflow-x: hidden;
    width: 100%;
    max-width: 100%;
}

.carousel-inner {
    display: flex;
    transition: transform 0.3s ease-in-out;
    gap: 20px;
    padding: 10px;
    min-width: 100%;
}

.candidate-card {
    flex: 0 0 260px;
    width: 300px;
    text-align: center;
    background: #fff;
    border-radius: 8px;
    padding: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    color: black;
    transition: transform 0.3s ease;
}
.candidate-card:hover {
    transform: scale(1.03);
}
.candidate-photo {
    width: 60%;
    height: 180px;
   
    border-radius: 10px;
}
.position-title {
    font-size: 20px;
    margin: 20px 0 10px 0;
    color: white;
    background: #196F38;
    padding: 10px;
    border-radius: 5px;
}
.carousel-controls {
    margin: 10px 0;
    text-align: center;
}
.carousel-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: #196F38;
    color: white;
    border: none;
    padding: 10px;
    z-index: 1;
    cursor: pointer;
    border-radius: 50%;
}
.carousel-arrow.left {
    left: 0;
}
.carousel-arrow.right {
    right: 0;
}
/* Make carousel display nicely on mobile */
@media screen and (max-width: 768px) {
 
  .vote-box1 {
    max-width: 40%;
    margin: 10px 0;
    padding: 10px;
  }

    .carousel-container {
    overflow: hidden;
    position: relative;
  }

  .carousel-inner {
    display: flex;
    transition: transform 0.3s ease;
    scroll-behavior: smooth;
  }

  .candidate-card {
    flex: 0 0 100%;
    max-width: 100%;
    box-sizing: border-box;
    padding: 10px;
    margin: 0 auto;
  }

  .carousel-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 2;
    background: #196F38;
    color: #fff;
    border: none;
    font-size: 24px;
    cursor: pointer;
    padding: 8px 12px;
  }

  .carousel-arrow.left {
    left: 5px;
  }

  .carousel-arrow.right {
    right: 5px;
  }

  .position-block {
    padding: 10px;
  }

  .carousel-controls {
    text-align: center;
    margin-top: 15px;
  }

  /* Make buttons bigger and easier to tap on mobile */
  .carousel-controls button {
    width: 120px;
    margin: 5px;
  }

 
}

</style>
</head>
<body>
<?php include('nav_top.php'); ?>
<div class="wrapper">
<div class="home_body">
<?php include('homesidebar.php'); ?>
 <hr class="footer-line1">
<div class="vote-box1">
<form method="post" action="vote.php" id="voteForm">

    <h2 style="text-align: center; color: #196F38; font-weight: bold; margin-bottom: 30px;">PLSS VOTE WISELY</h2>
<?php
$positions = [
    'President',
    'Vice-President',
    'Governor',
    'Vice-Governor',
    'Secretary',
    'Treasurer',
    'Social-Media Officer',
    'Representative'
];
$index = 0;

foreach ($positions as $position):
    $safe_position = mysqli_real_escape_string($conn, $position);
    $query = mysqli_query($conn, "SELECT * FROM candidate WHERE Position='$safe_position'") or die(mysqli_error($conn));
    if (mysqli_num_rows($query) > 0):
?>
<div class="position-block" id="position_<?php echo $index; ?>" style="<?php echo ($index !== 0) ? 'display:none;' : ''; ?>">
    
    <div class="position-header">
        <div class="position-title">Candidates for <?php echo htmlspecialchars($position); ?></div>
    </div>


    <div class="carousel-container">
   <button type="button" class="carousel-arrow left" id="left_<?php echo $index; ?>" onclick="scrollCarousel('carousel_<?php echo $index; ?>', -1, <?php echo $index; ?>)">&#10094;</button>
<div class="carousel-inner" id="carousel_<?php echo $index; ?>">


        <?php while ($row = mysqli_fetch_assoc($query)):
            $photo = $row['Photo'];
            $photo_path = 'admin/upload/' . basename($photo);
        ?>
        <div class="candidate-card">
             <div style="font-weight: bold; color: #196F38; margin-bottom: 5px;">
                        <?php echo htmlspecialchars($row['Position']); ?>
                    </div>
            <img class="candidate-photo" src="<?php echo $photo_path; ?>" alt="Candidate Photo">
            <div style="margin-top:10px;">
                <strong><?php echo htmlspecialchars($row['FirstName'] . ' ' . $row['LastName']); ?></strong>
            </div>
            <div style="font-size: 14px;"><?php echo htmlspecialchars($row['Party']); ?></div>
            <input type="radio" name="<?php echo strtolower(str_replace(['-', ' '], '_', $position)); ?>"
                value="<?php echo $row['CandidateID']; ?>" required style="accent-color: #196F38;">
            <div style="margin-top: 5px;">
                <a class="btn btn-info btn-small" data-toggle="modal" href="#viewModal<?php echo $row['CandidateID']; ?>">
                    <i class="icon-list icon-large"></i> View
                </a>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal hide fade" id="viewModal<?php echo $row['CandidateID']; ?>">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Candidate Qualification</h3>
            </div>
            <div class="modal-body" style="text-align:center; background-color:#fff; color:000;">
                <p><strong>Qualification:</strong> <?php echo htmlspecialchars($row['Qualification']); ?></p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Close</a>
            </div>
        </div>
        <?php endwhile; ?>

         </div>
<button type="button" class="carousel-arrow right" id="right_<?php echo $index; ?>" onclick="scrollCarousel('carousel_<?php echo $index; ?>', 1, <?php echo $index; ?>)">&#10095;</button>
</div>

    <div class="carousel-controls">
    <?php if ($index > 0): ?>
    <button type="button" class="btn btn-secondary" onclick="previousPosition(<?php echo $index; ?>)">Back</button>
    <?php endif; ?>
    
    <?php if ($index < count($positions) - 1): ?>
    <button type="button" class="btn btn-primary" onclick="nextPosition(<?php echo $index; ?>, '<?php echo strtolower(str_replace(['-', ' '], '_', $position)); ?>')">Next</button>
    <?php else: ?>
    <button type="submit" class="btn btn-success"><i class="icon-thumbs-up icon-large"></i>&nbsp;Submit Vote</button>
    <?php endif; ?>
</div>

</div>
<?php
    $index++;
    endif;
endforeach;
?>
</form>
</div> <!-- End of vote-box -->

<script>
function nextPosition(currentIndex, positionName) {
    const radios = document.getElementsByName(positionName);
    let selected = false;

    for (let radio of radios) {
        if (radio.checked) {
            selected = true;
            break;
        }
    }

    if (!selected) {
        alert("Please select a candidate before proceeding.");
        return;
    }

    document.getElementById('position_' + currentIndex).style.display = 'none';
    var next = document.getElementById('position_' + (currentIndex + 1));
    if (next) {
        next.style.display = 'block';
        next.scrollIntoView({ behavior: "smooth" });
    }
}

function previousPosition(currentIndex) {
    document.getElementById('position_' + currentIndex).style.display = 'none';
    var prev = document.getElementById('position_' + (currentIndex - 1));
    if (prev) {
        prev.style.display = 'block';
        prev.scrollIntoView({ behavior: "smooth" });
    }
}

function scrollCarousel(id, direction, index) {
    const container = document.getElementById(id);
    const scrollAmount = 320;

    container.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });

    // Give it time to scroll before checking
    setTimeout(() => {
        const scrollLeft = container.scrollLeft;
        const maxScroll = container.scrollWidth - container.clientWidth;

        // Disable/Enable arrows based on scroll position
        document.getElementById('left_' + index).disabled = scrollLeft <= 0;
        document.getElementById('right_' + index).disabled = scrollLeft >= maxScroll - 5;
    }, 300); // Match transition duration
}

// Optional: Disable left arrows initially
window.onload = function() {
    const count = <?php echo count($positions); ?>;
    for (let i = 0; i < count; i++) {
        const container = document.getElementById('carousel_' + i);
        if (container) {
            document.getElementById('left_' + i).disabled = true;

            // Disable right arrow if items fit in view (no scroll needed)
            const maxScroll = container.scrollWidth - container.clientWidth;
            if (maxScroll <= 0) {
                document.getElementById('right_' + i).disabled = true;
            }
        }
    }
};
</script>

<div class="foot" style="margin-top: 40px;">
    <?php include('footer1.php'); ?>
</div>

</div>
</div>
</body>
</html>
