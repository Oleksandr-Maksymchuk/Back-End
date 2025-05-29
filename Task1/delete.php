<?php
session_start();
require 'db.php';
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
session_destroy();
header("Location: index.php");
