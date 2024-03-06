<?php

// Завдання 1: Функція для виведення елементів масиву, що повторюються
function findDuplicates($array) {
    $duplicates = array_count_values($array);
    foreach ($duplicates as $value => $count) {
        if ($count > 1) {
            echo "$value повторюється $count разів<br>";
        }
    }
}

// Завдання 2: Функція-генератор імен тварин
function generateAnimalName($parts) {
    $animals = ['кішка', 'собака', 'хом\'як', 'папуга'];
    $name = '';
    for ($i = 0; $i < count($parts); $i++) {
        $index = rand(0, count($parts) - 1);
        $name .= $parts[$index];
    }
    return $name . ' ' . $animals[rand(0, count($animals) - 1)];
}

// Завдання 3: Функція для об'єднання, вилучення повторів та сортування масиву
function mergeArraysAndSort($array1, $array2) {
    $mergedArray = array_merge($array1, $array2);
    $uniqueArray = array_unique($mergedArray);
    sort($uniqueArray);
    return $uniqueArray;
}

// Завдання 4: Сортування асоціативного масиву за іменами або віком
function sortUsers($users, $sortBy = 'ім\'я') {
    if ($sortBy === 'вік') {
        asort($users);
    } else {
        ksort($users);
    }
    return $users;
}

// Функція для створення масиву з випадковою довжиною та випадковими значеннями
function createArray() {
    $length = rand(3, 7);
    $array = [];
    for ($i = 0; $i < $length; $i++) {
        $array[] = rand(10, 20);
    }
    return $array;
}

// Приклади масивів та асоціативного масиву
$array1 = createArray();
$array2 = createArray();
$parts = ['Барс', 'Мурч', 'Шерст'];
$users = [
    'Анна' => 25,
    'Петро' => 30,
    'Іван' => 20,
    'Марія' => 35
];

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Робота з масивами</title>
</head>
<body>

<h2>Завдання 1:</h2>
<p><?php findDuplicates($array1); ?></p>

<h2>Завдання 2:</h2>
<p><?php echo generateAnimalName($parts); ?></p>

<h2>Завдання 3:</h2>
<p><pre><?php print_r(mergeArraysAndSort($array1, $array2)); ?></pre></p>

<h2>Завдання 4:</h2>
<p>Сортування за іменами:</p>
<p><pre><?php print_r(sortUsers($users)); ?></pre></p>

<p>Сортування за віком:</p>
<p><pre><?php print_r(sortUsers($users, 'вік')); ?></pre></p>

</body>
</html>
