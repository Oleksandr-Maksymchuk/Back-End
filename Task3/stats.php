<?php
require 'db.php';
$avg = $pdo->query("SELECT AVG(salary) AS avg_salary FROM employees")->fetch();
echo "Середня зарплата: " . round($avg['avg_salary'], 2) . "<br>";

$counts = $pdo->query("SELECT position, COUNT(*) as count FROM employees GROUP BY position");
echo "<h3>Кількість працівників по посадах:</h3>";
foreach ($counts as $row) {
    echo "{$row['position']}: {$row['count']}<br>";
}
echo "<br><a href='index.php'>Назад</a>";
?>