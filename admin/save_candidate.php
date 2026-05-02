<?php
include('dbcon.php');

if (isset($_POST['save'])) {
    // Get and sanitize form data (use mysqli real escape or prepared statements)
    $rfirstname = trim($_POST['rfirstname']);
    $rlastname = trim($_POST['rlastname']);
    $rgender = trim($_POST['rgender']);
    $ryear = trim($_POST['ryear']);
    $rposition = trim($_POST['rposition']);
    $rmname = trim($_POST['rmname']);
    $party = trim($_POST['party']);
    $qualification = trim($_POST['qualification']);  // <-- Added qualification
    $user_name = trim($_POST['user_name']);

    // Map positions to 'abc' codes
    $abc_map = [
        'President' => 'p',
        'Vice-President' => 'vp',
        'Governor' => 'a',
        'Vice-Governor' => 'b',
        'Secretary' => 's',
        'Treasurer' => 't',
        'Social-Media Officer' => 'smo',
        'Representative' => 'r'
    ];

    $abc = isset($abc_map[$rposition]) ? $abc_map[$rposition] : '';

    // Validate and process uploaded image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_name = basename($_FILES['image']['name']);
        $image_type = mime_content_type($image_tmp);
        $image_size = $_FILES['image']['size'];

        // Check file type and size (limit to 2MB)
        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($image_type, $allowed_types)) {
            die("Error: Only JPG and PNG images are allowed.");
        }

        if ($image_size > 2 * 1024 * 1024) {
            die("Error: Image size exceeds 2MB.");
        }

        // Generate unique file name and move image
        $unique_name = time() . "_" . preg_replace("/[^a-zA-Z0-9.\-_]/", "", $image_name);
        $upload_path = "upload/" . $unique_name;

        if (!move_uploaded_file($image_tmp, $upload_path)) {
            die("Error: Failed to upload image.");
        }

    } else {
        die("Error: No image uploaded or upload failed.");
    }

    // Insert to database using prepared statement including qualification field
    $stmt = $conn->prepare("
        INSERT INTO candidate 
            (FirstName, LastName, Year, Position, Gender, MiddleName, Photo, Party, abc, Qualification)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssssssssss",
        $rfirstname, $rlastname, $ryear, $rposition,
        $rgender, $rmname, $upload_path, $party, $abc, $qualification
    );

    if ($stmt->execute()) {
        // Use prepared statement for history log to avoid SQL injection
        $fullname = $rfirstname . " " . $rlastname;
        $history_stmt = $conn->prepare("INSERT INTO history (data, action, date, user) VALUES (?, ?, NOW(), ?)");
        if ($history_stmt) {
            $action = "Added Candidate";
            $history_stmt->bind_param("sss", $fullname, $action, $user_name);
            $history_stmt->execute();
            $history_stmt->close();
        }

        header("Location: candidate_list.php");
        exit();
    } else {
        die("Error: Could not save candidate. " . $stmt->error);
    }

    $stmt->close();
}
?>
