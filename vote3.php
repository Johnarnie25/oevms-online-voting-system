<?php
session_start();
include('dbcon.php');
include('header.php');

$positions = [
    'president',
    'vice_president',
    'governor',
    'vice_governor',
    'secretary',
    'treasurer',
    'social_media_officer',
    'representative'
];

if (isset($_POST['final_submit'])) {
    $session_id = $_SESSION['id'];
    $votes = [];
    $room = mysqli_real_escape_string($conn, $_POST['room'] ?? '');
    date_default_timezone_set('Asia/Manila');
    $dateVoted = date('Y-m-d');
    $timeVoted = date('H:i:s');

    $error = false;
    foreach ($positions as $pos) {
        $candidateID = $_POST[$pos] ?? '';
        if (!empty($candidateID)) {
            $candidateID = mysqli_real_escape_string($conn, $candidateID);
            if (!mysqli_query($conn, "INSERT INTO votes (CandidateID) VALUES ('$candidateID')")) {
                $error = true;
                break;
            }
        }
    }

    if (!$error) {
        $updateQuery = "
            UPDATE voters 
            SET Status='Voted', Room='$room', DateVoted='$dateVoted', TimeVoted='$timeVoted' 
            WHERE VoterID='$session_id'
        ";

        if (mysqli_query($conn, $updateQuery)) {
            header("Location: thankyou.php");
            exit;
        }
    }

    echo "<script>alert('An error occurred while submitting your vote. Please try again.'); window.history.back();</script>";
}

function getCandidateName($conn, $candidateID) {
    $candidateID = mysqli_real_escape_string($conn, $candidateID);
    $result = mysqli_query($conn, "SELECT FirstName, LastName FROM candidate WHERE CandidateID='$candidateID'");
    if ($row = mysqli_fetch_assoc($result)) {
        return htmlspecialchars($row['FirstName'] . ' ' . $row['LastName']);
    }
    return 'Unknown Candidate';
}
?>

<link rel="stylesheet" type="text/css" href="admin/css/style.css" />
<script src="jquery.iphone-switch.js" type="text/javascript"></script>
</head>
<body>
<?php include('nav_top.php'); ?>
<div class="wrapper">
<div class="home_body">
<?php include('homesidebar.php'); ?>
<hr>

<h2 style="text-align: center; color: #196F38; font-weight: bold; margin-bottom: 30px;">BALLOT CONFIRMATION</h2>

<form method="POST">
    <div class="ballot" style="max-width: 900px; margin: 30px auto; padding: 20px; border: 2px solid #196F38; border-radius: 10px; background-color: #f9f9f9; box-shadow: 0 2px 8px #196F38;">

        <div class="grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <?php
            foreach ($positions as $index => $pos) {
                $display_name = ucwords(str_replace('_', ' ', $pos));
                $candidateID = $_POST[$pos] ?? '';

                echo '<div style="padding: 15px; border: 1px solid #ccc; border-radius: 8px; background: #fff;">';
                echo '<p style="margin: 0 0 5px; font-weight: bold; color: #196F38;">' . $display_name . '</p>';

                if (empty($candidateID)) {
                    echo '<i style="color: #888;">No Candidate Selected</i>';
                } else {
                    echo '<p style="color: #000; margin: 0;">' . getCandidateName($conn, $candidateID) . '</p>';
                    echo '<input type="hidden" name="' . htmlspecialchars($pos) . '" value="' . htmlspecialchars($candidateID) . '" />';
                }

                echo '</div>';
            }
            ?>
        </div>

        <!-- Room Input -->
        <div class="cent" style="padding: 20px 0 0;">
            <label for="room" style="font-weight: bold; color: #000;">Enter Your Room:</label><br>
            <input type="text" name="room" id="room" required style="width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;">
        </div>

        <!-- Submit Button -->
        <div style="text-align: center; margin-top: 30px;">
    <button 
        name="final_submit" 
        type="submit" 
        class="btn btn-success"
        style="
            background-color: #196F38;
            border: none;
            padding: 12px 30px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: background-color 0.3s ease;
        "
        onmouseover="this.style.backgroundColor='#000';"
        onmouseout="this.style.backgroundColor='#000';"
    >
        <i class="icon-save icon-large"></i>&nbsp; Submit Final Votes
    </button>
</div>
        </div>
    </div>
</form>

<div class="foot" style="margin-top: 40px;">
    <?php include('footer1.php'); ?>
</div>
</body>
</html>
