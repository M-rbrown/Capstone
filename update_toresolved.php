<?php
require_once('includes/load.php');

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method. Use POST.']);
    exit;
}

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    echo json_encode(['success' => false, 'message' => 'Valid ticket ID is required.']);
    exit;
}

$ticketId = (int)$_POST['id'];
$db = $GLOBALS['db'];
$conn = $db->con;

if (!$conn) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
    exit;
}

// Update ticket status
$stmt = $conn->prepare("UPDATE tickets SET status = 'Resolved' WHERE id = ?");
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Prepare failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param("i", $ticketId);
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => "Ticket #$ticketId resolved successfully", 'newStatus' => 'Resolved']);
} else {
    echo json_encode(['success' => false, 'message' => 'Update failed: ' . $stmt->error]);
}

$stmt->close();
?>