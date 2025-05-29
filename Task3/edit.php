<?php
require 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM employees WHERE id = ?");
$stmt->execute([$id]);
$emp = $stmt->fetch();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("UPDATE employees SET name=?, position=?, salary=? WHERE id=?");
    $stmt->execute([$_POST['name'], $_POST['position'], $_POST['salary'], $id]);
    header("Location: index.php");
}
?>
<form method="post">
    Ім'я: <input type="text" name="name" value="<?= $emp['name'] ?>"><br>
    Посада: <input type="text" name="position" value="<?= $emp['position'] ?>"><br>
    Зарплата: <input type="number" step="0.01" name="salary" value="<?= $emp['salary'] ?>"><br>
    <button type="submit">Оновити</button>
</form>