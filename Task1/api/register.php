<?php
require '../db.php';
$data = json_decode(file_get_contents("php://input"), true);
$name = trim($data['name']);
$email = trim($data['email']);
$password = trim($data['password']);

if (!$name || !$email || strlen($password) < 6) {
    echo json_encode(['message' => 'Некоректні дані']);
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->rowCount()) {
    echo json_encode(['message' => 'Email вже існує']);
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)")
    ->execute([$name, $email, $hash]);
echo json_encode(['message' => 'Користувача зареєстровано']);
?>