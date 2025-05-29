<?php session_start(); ?>
<?php if (isset($_SESSION['user_id'])): ?>
    <p>Привіт, <?= $_SESSION['username'] ?>!</p>
    <a href="edit.php">Редагувати профіль</a> |
    <a href="logout.php">Вийти</a> |
    <a href="delete.php">Видалити профіль</a>
<?php else: ?>
    <h2>Вхід</h2>
    <form method="post" action="login.php">
        <input name="username" required placeholder="Логін">
        <input name="password" type="password" required placeholder="Пароль">
        <button type="submit">Увійти</button>
    </form>
    <p><a href="register.php">Реєстрація</a></p>
<?php endif; ?>