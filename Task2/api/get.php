<?php
require '../db.php';
$stmt = $pdo->query("SELECT id, title, text FROM notes");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
