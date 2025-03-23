<?php
require_once('includes/load.php'); // Ensure database connection is included

header('Content-Type: application/json');

// Fetch only "Resolved" tickets
$query = "SELECT 
            id, 
            issue, 
            requester, 
            department, 
            priority, 
            assigned_to, 
            issue_description, 
            status, 
            DATE(date_submitted) AS date_only, 
            TIME(date_submitted) AS time_only 
          FROM tickets
          WHERE status = 'Resolved'";

$result = $db->query($query);

$tickets = [];
while ($row = $result->fetch_assoc()) {
    $tickets[] = $row;
}

echo json_encode($tickets); // Return the data in JSON format
?>
