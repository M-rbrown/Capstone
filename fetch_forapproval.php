<?php
require_once('includes/load.php'); // Load database connection

header('Content-Type: application/json');

$query = "SELECT * FROM tickets WHERE status = 'For Approval'"; // Ensure 'Pending' is an exact match
$result = $db->query($query);

$requests = [];
while ($row = $result->fetch_assoc()) {
    $requests[] = $row;
}

echo json_encode($requests);
?>
