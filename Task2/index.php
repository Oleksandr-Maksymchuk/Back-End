<?php
require_once "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Товари</title>
</head>
<body>
    <h1>Список товарів</h1>
    <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Назва</th><th>Ціна</th><th>Кількість</th><th>Дата</th></tr>
        <?php
        $sql = "SELECT * FROM tov";
        $result = $pdo->query($sql);
        foreach ($result as $row) {
            echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['cost']}</td><td>{$row['kol']}</td><td>{$row['date']}</td></tr>";
        }
        ?>
    </table>

    <h2>Дії</h2>
    <form action="delete.php" method="post">
        ID для видалення: <input type="number" name="delete_id" required>
        <button type="submit">Видалити запис</button>
    </form>
    <br>
    <a href="insert.php"><button>Додати запис</button></a>
</body>
</html>