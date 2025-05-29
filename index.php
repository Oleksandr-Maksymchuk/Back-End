<?php
require_once 'autoload.php';
require_once 'FileManager.php';

use Models\UserModel;
use Controllers\UserController;
use Views\UserView;

$model = new UserModel();
$controller = new UserController();
$view = new UserView();

echo $model->getMessage();
echo "<br>";
echo $controller->handleRequest();
echo "<br>";
echo $view->render();
echo "<br>";

FileManager::writeFile('file1.txt', 'Новий запис у файл 1');
FileManager::writeFile('file2.txt', 'Другий запис у файл 2');

echo "<hr><strong>Читання файлів:</strong><br>";
echo nl2br(FileManager::readFile('file1.txt'));
echo "<br>";
echo nl2br(FileManager::readFile('file2.txt'));
