<?php
// Начнем с обработки cookie для задания 1
if (isset($_GET['font'])) {
    setcookie('font_size', $_GET['font'], time() + 86400, '/'); // Cookie на 1 день
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}
$font_size = isset($_COOKIE['font_size']) ? $_COOKIE['font_size'] : '16px';

session_start();

// Авторизация (задание 2)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'], $_POST['password'])) {
    if ($_POST['login'] === 'Admin' && $_POST['password'] === 'password') {
        $_SESSION['user'] = 'Admin';
    } else {
        $error = "Невірний логін або пароль";
    }
}
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>PHP Завдання</title>
</head>
<body style="font-size: <?= htmlspecialchars($font_size) ?>;">
    <p>
        <a href="?font=24px">Великий шрифт</a> |
        <a href="?font=18px">Середній шрифт</a> |
        <a href="?font=12px">Маленький шрифт</a>
    </p>
    
    <?php if (isset($_SESSION['user'])): ?>
        <p>Добрий день, <?= $_SESSION['user'] ?>!</p>
        <a href="?logout=1">Вийти</a>
    <?php else: ?>
        <form method="post">
            <label>Логін: <input type="text" name="login" required></label>
            <label>Пароль: <input type="password" name="password" required></label>
            <button type="submit">Увійти</button>
        </form>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <?php endif; ?>

    <!-- Задание 3: Комментарии -->
    <h2>Залишити коментар</h2>
    <form method="post" action="comments.php">
        <input type="text" name="name" placeholder="Ваше ім'я" required>
        <textarea name="comment" placeholder="Ваш коментар" required></textarea>
        <button type="submit">Надіслати</button>
    </form>
    <h3>Коментарі:</h3>
    <table border="1">
        <?php include 'comments.php'; ?>
    </table>

    <!-- Задание 4: Загрузка файлов -->
    <h2>Завантаження зображення</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <button type="submit">Завантажити</button>
    </form>

    <!-- Задание 5: Работа с каталогами -->
    <h2>Реєстрація користувача (створення папки)</h2>
    <form action="create_folder.php" method="post">
        <label>Логін: <input type="text" name="login" required></label>
        <label>Пароль: <input type="password" name="password" required></label>
        <button type="submit">Створити папку</button>
    </form>
    
    <h2>Видалення користувача (видалення папки)</h2>
    <form action="delete.php" method="post">
        <label>Логін: <input type="text" name="login" required></label>
        <label>Пароль: <input type="password" name="password" required></label>
        <button type="submit">Видалити папку</button>
    </form>
</body>
</html>

<?php
// create_folder.php - создание папки пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $login = preg_replace('/[^a-zA-Z0-9_-]/', '', $_POST['login']);
    $user_dir = __DIR__ . "/users/" . $login;
    
    if (!is_dir($user_dir)) {
        mkdir($user_dir, 0777, true);
        mkdir($user_dir . "/video", 0777, true);
        mkdir($user_dir . "/music", 0777, true);
        mkdir($user_dir . "/photo", 0777, true);
        file_put_contents($user_dir . "/info.txt", "Користувач: $login\n");
        echo "Папка створена.";
    } else {
        echo "Помилка: така папка вже існує.";
    }
}

// delete.php - удаление папки пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $login = preg_replace('/[^a-zA-Z0-9_-]/', '', $_POST['login']);
    $user_dir = __DIR__ . "/users/" . $login;
    
    if (is_dir($user_dir)) {
        function deleteFolder($folder) {
            foreach (glob("$folder/*") as $file) {
                is_dir($file) ? deleteFolder($file) : unlink($file);
            }
            rmdir($folder);
        }
        deleteFolder($user_dir);
        echo "Папка видалена.";
    } else {
        echo "Помилка: така папка не існує.";
    }
}