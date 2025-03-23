<?php
require_once('includes/load.php'); // Ensures $db object is available

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticketId = intval($_POST['id']);
    $action = $_POST['action'];

    if ($action === 'approved') {
        // Set the status to 'Pending' for further approval
        $status = 'Pending';
    } elseif ($action === 'disapproved') {
        // If disapproved, set status to 'Disapproved'
        $status = 'Disapproved';
    }

    $query = "UPDATE tickets SET status = ? WHERE id = ?";
    $stmt = $db->con->prepare($query);

    if ($stmt) {
        $stmt->bind_param('si', $status, $ticketId);
        if ($stmt->execute()) {
            echo "Ticket status updated to $status.";
        } else {
            echo "Failed to update ticket status.";
        }
        $stmt->close();
    } else {
        echo "Error preparing statement.";
    }

    $db->db_disconnect(); // Close the connection properly
}
?>
