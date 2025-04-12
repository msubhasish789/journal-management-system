<?php


    include('connection.php');
    
// Assuming your database table structure has a column 'status' for the reviewer status
$query = "SELECT status FROM reviewers WHERE reviewer_id = 1"; // Adjust the query based on your actual database structure
$result = $mysqli->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $status = $row['status'];

    // Respond with JSON
    header('Content-Type: application/json');
    echo json_encode(['status' => $status]);

    $result->free();
} else {
    echo json_encode(['status' => 'error', 'message' => $mysqli->error]);
}

$mysqli->close();
?>
