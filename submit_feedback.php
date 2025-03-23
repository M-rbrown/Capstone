<?php
require_once('includes/load.php'); // Load database connection

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'], $_POST['feedback'], $_POST['comments'])) {
    $ticketId = intval($_POST['id']); // Ensure it's an integer
    $feedback = intval($_POST['feedback']); // Ensure it's an integer (rating)
    $comments = trim($_POST['comments']); // Trim spaces

    global $db;
    $conn = $db->con;

    if (!$conn) {
        echo json_encode(["status" => "error", "message" => "Database connection error."]);
        exit;
    }

    // Check if ticket exists before updating
    $checkQuery = "SELECT id FROM tickets WHERE id = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("i", $ticketId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["status" => "error", "message" => "Ticket ID not found."]);
        exit;
    }
    $stmt->close();

    // Update feedback and comments
    $query = "UPDATE tickets SET feedback = ?, comments = ? WHERE id = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo json_encode(["status" => "error", "message" => "Prepare failed: " . $conn->error]);
        exit;
    }

    $stmt->bind_param("isi", $feedback, $comments, $ticketId);
    
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Feedback submitted successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Missing required data."]);
}
?>