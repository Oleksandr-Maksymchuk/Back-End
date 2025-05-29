<?php
session_start();

// Перевірка співпадіння паролів
if ($_POST['password'] !== $_POST['password_confirm']) {
    $_SESSION['error'] = "Паролі не співпадають.";
    header('Location: index.php'); // Повернення на форму реєстрації
    exit;
}

// Збереження даних у сесії
$_SESSION['login'] = $_POST['login'];
$_SESSION['gender'] = $_POST['gender'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['games'] = $_POST['games'] ?? [];
$_SESSION['about'] = $_POST['about'] ?? ''; // Збереження інформації про себе

// Обробка завантаження фотографії
if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    $uploadFile = $uploadDir . basename($_FILES['photo']['name']);
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
        $_SESSION['photo'] = $uploadFile;
    } else {
        $_SESSION['photo'] = null;
    }
} else {
    $_SESSION['photo'] = null;
}

header('Location: display.php'); // Перенаправлення на сторінку відображення
exit;
?>