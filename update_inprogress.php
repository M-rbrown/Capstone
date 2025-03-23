<?php

require_once ('includes/load.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

$response = ['success' => false, 'message' => 'Something went wrong'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["request_id"]) && isset($_POST["new_status"])) {
        $requestId = intval($_POST["request_id"]);
        $newStatus = $_POST["new_status"];

        // Debugging: Print received values
        $response["debug"] = "Received request_id: $requestId, new_status: $newStatus";

        // Database connection (Replace with your credentials)
        $conn = new mysqli("localhost", "root", "", "inventory");

        if ($conn->connect_error) {
            $response["message"] = "Database connection failed: " . $conn->connect_error;
            echo json_encode($response);
            exit;
        }

        // Debug: Check if the ticket ID exists
        $checkQuery = "SELECT id FROM Tickets WHERE id = ?";
        $checkStmt = $conn->prepare($checkQuery);
        if (!$checkStmt) {
            $response["message"] = "Check Query Error: " . $conn->error;
            echo json_encode($response);
            exit;
        }
        $checkStmt->bind_param("i", $requestId);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows === 0) {
            $response["message"] = "Error: Ticket ID does not exist.";
            echo json_encode($response);
            exit;
        }
        $checkStmt->close();

        // Update ticket status
        $stmt = $conn->prepare("UPDATE Tickets SET status = ? WHERE id = ?");
        if (!$stmt) {
            $response["message"] = "Prepare Statement Error: " . $conn->error;
            echo json_encode($response);
            exit;
        }

        $stmt->bind_param("si", $newStatus, $requestId);

        if ($stmt->execute()) {
            $response["success"] = true;
            $response["message"] = "Request updated successfully!";
        } else {
            $response["message"] = "Database update failed: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        $response["message"] = "Invalid request parameters";
    }
}

echo json_encode($response);
exit;
