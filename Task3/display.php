<?php
session_start();
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Дані користувача</title>
</head>
<body>
    <h1>Дані користувача</h1>
    <p>Логін: <?php echo $_SESSION['login']; ?></p>
    <p>Стать: <?php echo $_SESSION['gender']; ?></p>
    <p>Місто: <?php echo $_SESSION['city']; ?></p>
    <p>Улюблені гри: <?php echo implode(', ', $_SESSION['games']); ?></p>
    <?php if (isset($_SESSION['photo'])): ?>
        <p>Фотографія: <img src="<?php echo $_SESSION['photo']; ?>" alt="Фото користувача"></p>
    <?php endif; ?>
    <a href="index.php">Повернутися на головну сторінку</a>
</body>
</html>