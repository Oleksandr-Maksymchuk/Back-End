<?php
require 'db.php';
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
$stmt->execute([$username, $email]);
if ($stmt->fetch()) {
    die("Користувач вже існує");
}

$stmt = $pdo->prepare("INSERT INTO users (username, password, email, first_name, last_name, gender, birthdate, phone, address)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$username, $password, $email, $_POST['first_name'], $_POST['last_name'], $_POST['gender'], $_POST['birthdate'], $_POST['phone'], $_POST['address']]);

header("Location: index.php");
