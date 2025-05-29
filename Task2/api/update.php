<?php
require '../db.php';
$data = json_decode(file_get_contents("php://input"), true);
$id = (int) $data['id'];
$title = trim($data['title']);
$content = trim($data['content']);
if (!$id || !$title || !$content) {
    echo json_encode(['message' => 'Невірні дані']);
    exit;
}
$pdo->prepare("UPDATE notes SET title = ?, content = ? WHERE id = ?")->execute([$title, $content, $id]);
echo json_encode(['message' => 'Замітку оновлено']);
?>