<?php
require '../db.php';
echo json_encode($pdo->query("SELECT * FROM notes ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC));
?>