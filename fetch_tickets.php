<?php
require_once('includes/load.php'); // Load database connection

header('Content-Type: application/json');

$query = "SELECT * FROM tickets"; // Fetch all tickets without filtering by status
$result = $db->query($query);

$tickets = [];
while ($row = $result->fetch_assoc()) {
    $tickets[] = $row;
}

echo json_encode($tickets);
?>
