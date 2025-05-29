<?php
require 'db.php';
echo "<h2>Перевірка нотаток</h2>";
try {
    $notes = $pdo->query("SELECT * FROM notes")->fetchAll(PDO::FETCH_ASSOC);
    if (!$notes) {
        echo "Немає нотаток.";
    } else {
        echo "<table border='1' cellpadding='5'><tr><th>ID</th><th>Заголовок</th><th>Текст</th></tr>";
        foreach ($notes as $note) {
            echo "<tr><td>{$note['id']}</td><td>{$note['title']}</td><td>{$note['content']}</td></tr>";
        }
        echo "</table>";
    }
} catch (PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}
?>
