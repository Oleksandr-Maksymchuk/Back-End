<?php
require 'db.php';
$stmt = $pdo->query("SELECT * FROM employees");
echo "<a href='add.php'>Додати працівника</a><br><br>";
echo "<table border='1'><tr><th>ID</th><th>Ім'я</th><th>Посада</th><th>Зарплата</th><th>Дії</th></tr>";
while ($row = $stmt->fetch()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['position']}</td>
            <td>{$row['salary']}</td>
            <td>
                <a href='edit.php?id={$row['id']}'>Редагувати</a> |
                <a href='delete.php?id={$row['id']}'>Видалити</a>
            </td>
          </tr>";
}
echo "</table><br><a href='stats.php'>Статистика</a>";
?>