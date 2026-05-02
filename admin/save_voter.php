<?php
include('dbcon.php');

$FirstName = $_POST['FirstName'] ?? '';
$LastName = $_POST['LastName'] ?? '';
$MiddleName = $_POST['MiddleName'] ?? '';
$Username = $_POST['UserName'] ?? '';
$Password = $_POST['Password'] ?? '';
$Email = $_POST['Email'] ?? '';
$Year = $_POST['Year'] ?? '';
$SchoolID = $_POST['SchoolID'] ?? '';  // Take exactly as input (string)

$pc_date = $_POST['pc_date'] ?? '';
$pc_time = $_POST['pc_time'] ?? '';
$user_name = $_POST['user_name'] ?? '';

if (!$FirstName || !$LastName || !$Username || !$Password) {
    die('Missing required fields.');
}

// Insert into voters table with SchoolID as is (string)
// Since SchoolID column is int, MySQL will convert string to int (e.g. '123abc' -> 123, 'abc' -> 0)
$query = "INSERT INTO voters (FirstName, LastName, MiddleName, Username, Password, Email, Year, Status, SchoolID) 
          VALUES (?, ?, ?, ?, ?, ?, ?, 'Unvoted', ?)";

$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameters as strings
$stmt->bind_param(
    "ssssssss",
    $FirstName,
    $LastName,
    $MiddleName,
    $Username,
    $Password,
    $Email,
    $Year,
    $SchoolID
);

if ($stmt->execute()) {
    // Insert into history
    $history_stmt = $conn->prepare("INSERT INTO history (data, action, date, user) VALUES (?, 'Added Voter', ?, ?)");
    if ($history_stmt) {
        $data = $FirstName . " " . $LastName;
        $datetime = $pc_date . ' ' . $pc_time;
        $history_stmt->bind_param("sss", $data, $datetime, $user_name);
        $history_stmt->execute();
        $history_stmt->close();
    }
    echo "Voter successfully added.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
