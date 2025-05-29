<?php
require_once 'Circle.php';
require_once 'Student.php';
require_once 'Programmer.php';

echo "<strong>Circle:</strong><br>";
$circle1 = new Circle(0, 0, 5);
$circle2 = new Circle(4, 3, 2);
echo $circle1 . "<br>";
echo $circle2 . "<br>";
echo "Перетинаються: " . ($circle1->intersects($circle2) ? "Так" : "Ні") . "<br><br>";

echo "<strong>Student:</strong><br>";
$student = new Student(180, 70, 20, 'KPI', 2);
$student->nextCourse();
$student->cleanRoom();
$student->cleanKitchen();
$student->birthChild();
$student->setHeight(185);
echo "Новий зріст: " . $student->getHeight() . "<br><br>";

echo "<strong>Programmer:</strong><br>";
$programmer = new Programmer(175, 80, 30, ['PHP', 'JavaScript'], 5);
$programmer->addLanguage('Python');
$programmer->cleanRoom();
$programmer->cleanKitchen();
$programmer->birthChild();
$programmer->setWeight(78);
echo "Нова вага: " . $programmer->getWeight() . "<br>";
