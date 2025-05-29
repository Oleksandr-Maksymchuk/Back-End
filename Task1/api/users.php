<?php
require '../db.php';
echo json_encode($pdo->query("SELECT id, name, email FROM users")->fetchAll(PDO::FETCH_ASSOC));
?>