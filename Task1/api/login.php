<?php
require '../db.php';
$data = json_decode(file_get_contents("php://input"), true);
$email = trim($data['email']);
$password = trim($data['password']);

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    echo json_encode(['message' => 'Вхід успішний', 'user' => $user]);
} else {
    echo json_encode(['message' => 'Невірна електронна адреса або пароль']);
}
?>