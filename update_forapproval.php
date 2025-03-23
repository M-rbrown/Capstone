<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include 'includes/load.php'; // Database connection

if (!isset($db) || !$db->con) {
    echo json_encode(["success" => false, "message" => "Database connection failed."]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["success" => false, "message" => "Invalid request method. Expected POST."]);
    exit;
}

$ticketId = isset($_POST['id']) ? intval($_POST['id']) : 0;
$newStatus = isset($_POST['new_status']) ? trim($_POST['new_status']) : '';

if ($ticketId <= 0 || empty($newStatus)) {
    echo json_encode(["success" => false, "message" => "Invalid ticket ID or status."]);
    exit;
}

// ✅ **Only updates the `Tickets` table (No notifications table)**
$sql = "UPDATE Tickets SET status = ? WHERE id = ?";
$stmt = $db->con->prepare($sql);

if (!$stmt) {
    echo json_encode(["success" => false, "message" => "Failed to prepare statement: " . $db->con->error]);
    exit;
}

$stmt->bind_param("si", $newStatus, $ticketId);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Ticket status updated successfully."]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to execute query: " . $stmt->error]);
}

$stmt->close();
$db->db_disconnect();
?>
