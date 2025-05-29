<?php
$comments_file = 'comments.txt';

// Обработка формы
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['comment'])) {
    $name = trim(htmlspecialchars($_POST['name']));
    $comment = trim(htmlspecialchars($_POST['comment']));
    
    if (!empty($name) && !empty($comment)) {
        $entry = "$name|$comment" . PHP_EOL;
        file_put_contents($comments_file, $entry, FILE_APPEND);
    }
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

// Вывод комментариев
if (file_exists($comments_file)) {
    $comments = file($comments_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    echo "<tr><th>Ім'я</th><th>Коментар</th></tr>";
    foreach ($comments as $comment) {
        list($user, $text) = explode('|', $comment, 2);
        echo "<tr><td>" . htmlspecialchars($user) . "</td><td>" . htmlspecialchars($text) . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>Коментарів поки що немає.</td></tr>";
}
?>