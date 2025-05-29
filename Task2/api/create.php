<?php
require '../db.php';
$data = json_decode(file_get_contents("php://input"), true);
$title = trim($data['title']);
$content = trim($data['content']);
if (!$title || !$content) {
    echo json_encode(['message' => 'Некоректні дані']);
    exit;
}
$pdo->prepare("INSERT INTO notes (title, content) VALUES (?, ?)")->execute([$title, $content]);
echo json_encode(['message' => 'Замітку додано']);
?>