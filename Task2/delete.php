<?php
require_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_id"])) {
    $id = $_POST["delete_id"];
    $stmt = $pdo->prepare("DELETE FROM tov WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit();
?>