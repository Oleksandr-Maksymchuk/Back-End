<?php
session_start();
require 'db.php';
$stmt = $pdo->prepare("UPDATE users SET email=?, first_name=?, last_name=?, gender=?, birthdate=?, phone=?, address=? WHERE id=?");
$stmt->execute([$_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['gender'], $_POST['birthdate'], $_POST['phone'], $_POST['address'], $_SESSION['user_id']]);
header("Location: index.php");
