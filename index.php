<?php

// Converter
function convertToDollars($uah) {
    $exchangeRate = 42;
    $usd = $uah / $exchangeRate;
    return "$uah грн можна обміняти на " . floor($usd) . " долар";
}

echo "<p>" . convertToDollars(80000) . "</p>";

// Seasons
function getSeason($month) {
    if ($month >= 3 && $month <= 5) {
        return "Весна";
    } elseif ($month >= 6 && $month <= 8) {
        return "Літо";
    } elseif ($month >= 9 && $month <= 11) {
        return "Осінь";
    } elseif ($month == 12 || $month == 1 || $month == 2) {
        return "Зима";
    } else {
        return "Невірний номер місяця";
    }
}

echo "<p>Місяць 4 відповідає сезону: " . getSeason(4) . "</p>";

// Vowels
function checkVowelConsonant($char) {
    $char = mb_strtolower($char, 'UTF-8');
    switch ($char) {
        case 'а': case 'е': case 'є': case 'и': case 'і': case 'ї': case 'о': case 'у': case 'ю': case 'я':
            return "$char - голосна літера";
        default:
            if (preg_match('/^[а-яґєії]$/u', $char)) {
                return "$char - приголосна літера";
            } else {
                return "$char - не є буквою";
            }
    }
}

echo "<p>" . checkVowelConsonant('б') . "</p>";

// Random numbers
function processRandomNumber() {
    $number = mt_rand(100, 999);
    $digits = str_split($number);
    $sum = array_sum($digits);
    $reversed = implode('', array_reverse($digits));
    rsort($digits);
    $maxNumber = implode('', $digits);

    return "<p>Випадкове число: $number</p>"
         . "<p>Сума цифр: $sum</p>"
         . "<p>Число у зворотному порядку: $reversed</p>"
         . "<p>Найбільше можливе число: $maxNumber</p>";
}

echo processRandomNumber();

// Tables
function generateTable($rows, $cols) {
    echo "<table border='1' style='border-collapse: collapse;'>";
    for ($i = 0; $i < $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $cols; $j++) {
            $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
            echo "<td style='width: 30px; height: 30px; background-color: $color;'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

echo "<p>Таблиця кольорових комірок:</p>";
echo generateTable(5, 5);

// Random squares
function drawRandomSquares($n) {
    echo "<div style='position: relative; width: 500px; height: 500px; background-color: black;'>";
    for ($i = 0; $i < $n; $i++) {
        $size = mt_rand(20, 100);
        $left = mt_rand(0, 500 - $size);
        $top = mt_rand(0, 500 - $size);
        echo "<div style='position: absolute; width: {$size}px; height: {$size}px; background-color: red; left: {$left}px; top: {$top}px;'></div>";
    }
    echo "</div>";
}

echo "<p>Випадкові квадрати:</p>";
echo drawRandomSquares(5);
?>