<?php
$upload_dir = 'uploads/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    
    if (in_array($file['type'], $allowed_types)) {
        $file_path = $upload_dir . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $file_path)) {
            echo "<p>Файл успішно завантажено: <a href='$file_path' target='_blank'>Переглянути</a></p>";
        } else {
            echo "<p style='color:red;'>Помилка завантаження файлу.</p>";
        }
    } else {
        echo "<p style='color:red;'>Неприпустимий формат файлу. Дозволені тільки JPG, PNG, GIF.</p>";
    }
} else {
    echo "<p style='color:red;'>Файл не був завантажений.</p>";
}
?>