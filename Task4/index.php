
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор функцій</title>
</head>
<body>
    <form action="calculate.php" method="post">
        <label for="x">x:</label>
        <input type="text" name="x" id="x" required>
        <label for="y">y:</label>
        <input type="text" name="y" id="y" required>
        <input type="submit" value="=">
    </form>
</body>
</html>