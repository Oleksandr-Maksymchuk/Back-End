<?php
require '../db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$pdo->prepare("DELETE FROM users WHERE id = ?")->execute([$id]);
echo json_encode(['message' => 'Користувача видалено']);
?>