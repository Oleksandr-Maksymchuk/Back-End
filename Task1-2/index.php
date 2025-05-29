<?php
// Завдання 1
// 1 
function replaceCharacters($text, $find, $replace) {
    return str_replace($find, $replace, $text);
}

// 2
function sortCities($cities) {
    $cityArray = explode(" ", $cities);
    sort($cityArray);
    return implode(" ", $cityArray);
}

// 3
function getFilename($path) {
    return pathinfo($path, PATHINFO_FILENAME);
}

// 4
function daysBetweenDates($date1, $date2) {
    $d1 = DateTime::createFromFormat('d-m-Y', $date1);
    $d2 = DateTime::createFromFormat('d-m-Y', $date2);
    return abs($d1->diff($d2)->days);
}

// 5
function generatePassword($length = 10) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+';
    return substr(str_shuffle($chars), 0, $length);
}

function isStrongPassword($password) {
    return preg_match('/[A-Z]/', $password) && 
           preg_match('/[a-z]/', $password) && 
           preg_match('/[0-9]/', $password) && 
           preg_match('/[!@#$%^&*()_+]/', $password) && 
           strlen($password) >= 8;
}

// Завдання 2
// 1
function findDuplicates($array) {
    return array_unique(array_diff_assoc($array, array_unique($array)));
}

// 2
function generatePetName($syllables) {
    shuffle($syllables);
    return ucfirst(implode('', array_slice($syllables, 0, rand(2, 3))));
}

// 3
function createArray() {
    return array_map(fn() => rand(10, 20), range(1, rand(3, 7)));
}

function mergeAndSortArrays($arr1, $arr2) {
    return array_values(array_unique(array_merge($arr1, $arr2)));
}

// 4
function sortUsers(&$users, $by) {
    if ($by === 'age') {
        uasort($users, fn($a, $b) => $a - $b);
    } elseif ($by === 'name') {
        ksort($users);
    }
}

$text = "Hello World";
echo replaceCharacters($text, "World", "PHP") . "\n";

echo sortCities("Житомир Київ Одеса Дніпро Миколаїв Рівне Полтава") . "\n";

echo getFilename("D:\\WebServers\\home\\testsite\\www\\myfile.txt") . "\n";

echo daysBetweenDates("10-03-2025", "15-03-2025") . "\n";

echo generatePassword(12) . "\n";

echo isStrongPassword("Aa1!") ? "Strong" : "Weak";

$duplicates = findDuplicates([1, 2, 2, 3, 4, 4, 5]);
print_r($duplicates);

$syllables = ["ba", "lu", "ka", "mo", "ti", "iv", "an"];
echo generatePetName($syllables) . "\n";

$array1 = createArray();
$array2 = createArray();
print_r(mergeAndSortArrays($array1, $array2));

$users = ["Alice" => 21, "Bob" => 42, "Charlie" => 37];
sortUsers($users, "age");
print_r($users);
?>
