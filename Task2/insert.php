<?php
require_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $cost = $_POST["cost"];
    $kol = $_POST["kol"];
    $date = $_POST["date"];

    $sql = "INSERT INTO tov (name, cost, kol, date) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $cost, $kol, $date]);

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Додати товар</title></head>
<body>
<h1>Додати новий товар</h1>
<form method="post">
    Назва: <input type="text" name="name" required><br><br>
    Вартість: <input type="number" name="cost" required><br><br>
    Кількість: <input type="number" name="kol" required><br><br>
    Дата реалізації: <input type="date" name="date" required><br><br>
    <button type="submit">Додати</button>
</form>
<a href="index.php">← Назад</a>
</body>
</html>