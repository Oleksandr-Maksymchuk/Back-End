<?php
require '../db.php';
$data = json_decode(file_get_contents("php://input"), true);
$id = (int) $data['id'];
$name = trim($data['name']);
$email = trim($data['email']);
if (!$id || !$name || !$email) {
    echo json_encode(['message' => 'Невірні дані']);
    exit;
}
$stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
$stmt->execute([$name, $email, $id]);
echo json_encode(['message' => 'Дані оновлено']);
?>