<?php
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['position'], $_POST['salary']]);
    header("Location: index.php");
}
?>
<form method="post">
    Ім'я: <input type="text" name="name"><br>
    Посада: <input type="text" name="position"><br>
    Зарплата: <input type="number" step="0.01" name="salary"><br>
    <button type="submit">Додати</button>
</form>