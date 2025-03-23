<?php
require_once('includes/load.php'); // Ensure database is loaded

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the database connection is valid
if (!isset($db)) {
    die("Database connection failed!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (!isset($_POST['Issue'], $_POST['requester'], $_POST['department'], $_POST['priority'], $_POST['assignedTo'], $_POST['ticketDescription'])) {
        die("Missing required fields!");
    }

    // Escape user inputs to prevent SQL injection
    $Issue = $db->escape($_POST['Issue']);
    $requester = $db->escape($_POST['requester']);
    $department = $db->escape($_POST['department']);
    $priority = $db->escape($_POST['priority']);
    $assignedTo = $db->escape($_POST['assignedTo']);
    $ticketDescription = $db->escape($_POST['ticketDescription']);

    // SQL Insert Query
    $query = "INSERT INTO tickets (Issue, requester, department, priority, assigned_to, issue_description, status, date_submitted, time_submitted) 
              VALUES ('$Issue', '$requester', '$department', '$priority', '$assignedTo', '$ticketDescription', 'For Approval', NOW(), NOW())";

    // ✅ Use `$db->query()` directly
    if ($db->query($query)) {
        // Redirect back to home.php with success message
        header("Location: home.php?success=1");
        exit();
    } else {
        die("Database error: " . $db->error());
    }
} else {
    die("Invalid request method!");
}
?>
