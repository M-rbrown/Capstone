<?php
require_once('includes/load.php'); // Load database connection

header('Content-Type: application/json');

// Fetch tickets that do not have feedback
$query = "SELECT * FROM tickets 
          WHERE (comments IS NULL OR comments = '') 
          AND (feedback IS NULL OR feedback = '')";

$result = $db->query($query);

$tickets = [];
while ($row = $result->fetch_assoc()) {
    $row['priority_color'] = getPriorityColor($row['priority']);
    $row['status_color'] = getStatusColor($row['status']);
    $tickets[] = $row;
}

// Function to get Priority Color
function getPriorityColor($priority) {
    switch (strtolower(trim($priority))) {
        case 'high': return 'red';
        case 'medium': return 'orange';
        case 'low': return 'green';
        default: return 'gray';
    }
}

// Function to get Status Color
function getStatusColor($status) {
    switch (strtolower(trim($status))) {
        case 'for approval': return 'blue';
        case 'in progress': return 'orange';
        case 'resolved': return 'green';
        case 'disapproved': return 'red';
        default: return 'gray';
    }
}

echo json_encode($tickets);
?>
