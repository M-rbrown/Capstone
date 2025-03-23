<?php
require_once('includes/load.php'); // Load database

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ticket_id'], $_POST['new_status'])) {
    $ticket_id = $db->escape($_POST['ticket_id']);
    $new_status = $db->escape($_POST['new_status']);

    // Validate allowed status changes
    $allowed_statuses = ['For Approval', 'Pending', 'In Progress', 'Disapproved'];
    if (!in_array($new_status, $allowed_statuses)) {
        die("Invalid status update!");
    }

    // Update the ticket status
    $query = "UPDATE tickets SET status = '$new_status' WHERE id = '$ticket_id'";
    if ($db->query($query)) {
        echo "Status updated successfully!";
    } else {
        echo "Error updating status: " . $db->error;
    }
} else {
    die("Invalid request!");
}
?>
