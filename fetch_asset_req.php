<?php
require_once('includes/load.php'); // Load database connection

header('Content-Type: application/json');

$query = "SELECT * FROM asset_requests";
$result = $db->query($query);

$requests = [];
while ($row = $result->fetch_assoc()) {
    $requests[] = $row;
}

// Return data as JSON
echo json_encode($requests);
?>
