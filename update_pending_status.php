<?php
require_once('includes/load.php'); // Load database connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $request_id = isset($_POST["request_id"]) ? intval($_POST["request_id"]) : null;
    $new_status = isset($_POST["new_status"]) ? trim($_POST["new_status"]) : null;
    
    if (!$request_id || !$new_status) {
        echo json_encode(["success" => false, "error" => "Invalid request data"]);
        exit;
    }

    $stmt = $db->prepare("UPDATE tickets SET status = ? WHERE id = ?");
    if (!$stmt) {
        echo json_encode(["success" => false, "error" => "Database error"]);
        exit;
    }

    $stmt->bind_param("si", $new_status, $request_id);
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Status updated to $new_status"]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "error" => "Invalid request method"]);
}
?>
