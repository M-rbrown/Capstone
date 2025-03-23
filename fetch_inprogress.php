<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database configuration
require_once 'includes/load.php';

// Ensure the global `$db` is available
global $db;

if (!isset($db)) {
    die(json_encode(["success" => false, "message" => "Database connection not found"]));
}

// Fetch in-progress tickets
$sql = "SELECT id, issue, requester, department, priority, assigned_to, issue_description, status 
        FROM Tickets 
        WHERE status = 'In Progress'";

$result = $db->query($sql);

if (!$result) {
    die(json_encode(["success" => false, "message" => "Database query failed"]));
}

$tickets = [];
while ($row = $db->fetch_assoc($result)) {
    $tickets[] = $row;
}

// Set JSON header and output the data
header('Content-Type: application/json');
echo json_encode($tickets);
?>