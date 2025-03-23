<?php
require_once('includes/load.php'); // Ensure database is loaded

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the database connection is valid
if (!isset($db)) {
    die("Database connection failed!");
}

// Ensure request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate required fields
    if (empty($_POST['full_name']) || empty($_POST['employee_id']) || empty($_POST['department']) || empty($_POST['asset_name']) || empty($_POST['asset_code'])) {
        die("Error: All fields are required!");
    }

    // Escape user inputs to prevent SQL injection
    $full_name = $db->escape($_POST['full_name']);
    $employee_id = $db->escape($_POST['employee_id']);
    $department = $db->escape($_POST['department']);
    $asset_name = $db->escape($_POST['asset_name']);
    $asset_code = $db->escape($_POST['asset_code']);
    $request_datetime = date("Y-m-d H:i:s"); // Correct format for storing date & time together

    // Insert data into asset_requests table
    $query = "INSERT INTO asset_requests (full_name, employee_id, department, asset_name, asset_code, request_date) 
              VALUES ('$full_name', '$employee_id', '$department', '$asset_name', '$asset_code', '$request_datetime')";

    // Execute query and check if successful
    if ($db->query($query)) {
        // Redirect to home.php with success message
        header("Location: home.php?success=1");
        exit();
    } else {
        die("Database error: " . $db->error);
    }
} else {
    die("Invalid request method!");
}
?>
