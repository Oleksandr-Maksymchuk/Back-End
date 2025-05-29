<?php
session_start();
require 'db.php';
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<form method="post" action="update.php">
    <input name="email" value="<?= $user['email'] ?>">
    <input name="first_name" value="<?= $user['first_name'] ?>">
    <input name="last_name" value="<?= $user['last_name'] ?>">
    <input name="gender" value="<?= $user['gender'] ?>">
    <input name="birthdate" value="<?= $user['birthdate'] ?>">
    <input name="phone" value="<?= $user['phone'] ?>">
    <input name="address" value="<?= $user['address'] ?>">
    <button type="submit">Оновити</button>
</form>
