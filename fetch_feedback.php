<?php
require_once('includes/load.php'); // Load database connection

header('Content-Type: application/json');

// Query to fetch tickets with feedback
$query = "SELECT id, issue, requester, assigned_to, status, feedback, comments 
          FROM tickets 
          WHERE feedback IS NOT NULL AND feedback != '' 
          AND comments IS NOT NULL AND comments != ''";

$result = $db->query($query);

if (!$result) {
    echo json_encode(["error" => "Query failed: " . $db->error]);
    exit();
}

$feedbacks = [];
while ($row = $result->fetch_assoc()) {
    $feedbacks[] = $row;
}

// Send JSON response
echo json_encode($feedbacks);
?>
