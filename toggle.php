<?php
require_once "config.php";

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
    exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

if (!$id) {
    echo json_encode(["success" => false, "message" => "Invalid ID."]);
    exit;
}

$stmt = $conn->prepare("UPDATE users SET status = IF(status = 0, 1, 0) WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

$stmt = $conn->prepare("SELECT status FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($status);

if ($stmt->fetch()) {
    echo json_encode(["success" => true, "status" => (int)$status]);
} else {
    echo json_encode(["success" => false, "message" => "Record not found."]);
}

$stmt->close();
$conn->close();
?>
