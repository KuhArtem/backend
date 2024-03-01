<?php
// Завдання 2: Вивід вірша
echo "<h2>Завдання 2: Вірш</h2>";
echo "Полину в мріях в купель океану<br>
Відчую шовковистість глибини<br>
Чарівні мушлі з дна собі дістану<br>
Щоб взимку тішили мене вони…<br><br>";

// Завдання 3: Конвертація гривень в долари
echo "<h2>Завдання 3: Конвертація гривень в долари</h2>";
$uah = 1500; // Сума в гривнях.
$exchange_rate = 27; // Курс обміну, 1 USD = 27 UAH.
$usd = $uah / $exchange_rate;
echo $uah . " грн. можна обміняти на " . round($usd, 2) . " долар<br><br>";

// Завдання 4: Визначення сезону за номером місяця
echo "<h2>Завдання 4: Визначення сезону</h2>";
$month = 5; // Травень
if ($month >= 3 && $month <= 5) {
    echo "Весна<br><br>";
} elseif ($month >= 6 && $month <= 8) {
    echo "Літо<br><br>";
} elseif ($month >= 9 && $month <= 11) {
    echo "Осінь<br><br>";
} else {
    echo "Зима<br><br>";
}

// Завдання 5: Визначення голосних і приголосних
echo "<h2>Завдання 5: Голосні та приголосні</h2>";
$char = 'a'; // Приклад символу
switch (strtolower($char)) {
    case 'a':
    case 'e':
    case 'i':
    case 'o':
    case 'u':
        echo "Голосна<br><br>";
        break;
    default:
        echo "Приголосна<br><br>";
}

// Завдання 6: Операції з тризначним числом
echo "<h2>Завдання 6: Операції з тризначним числом</h2>";
$number = mt_rand(100, 999); // Випадкове тризначне число
$sum = array_sum(str_split($number)); // Сума цифр
$reverse = strrev($number); // Число у зворотньому порядку
rsort($digits = str_split($number));
$max_number = implode('', $digits); // Найбільше можливе число
echo "Число: $number<br>";
echo "Сума цифр: $sum<br>";
echo "Число у зворотньому порядку: $reverse<br>";
echo "Найбільше можливе число: $max_number<br><br>";

// Завдання 7.1: Малювання таблиці
echo "<h2>Завдання 7.1: Таблиця</h2>";
function drawTable($rows, $cols) {
    echo "<table border='1'>";
    for ($i = 0; $i < $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $cols; $j++) {
            $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
            echo "<td style='background-color:$color;'>$i, $j</td>";
        }
        echo "</tr>";
    }
    echo "</table><br><br>";
}
drawTable(5, 5); // 5x5 таблиця

// Завдання 7.2: Малювання квадратів
echo "<h2>Завдання 7.2: Квадрати</h2>";
function drawSquares($n) {
    echo "<div style='position: relative; height: 600px; width: 100%;'>";
    for ($i = 0; $i < $n; $i++) {
        $size = mt_rand(50, 150);
        $left = mt_rand(0, 500);
        $top = mt_rand(0, 500);
        echo "<div style='position:absolute; width:".$size."px; height:".$size."px; background-color:red; left:".$left."px; top:".$top."px;'></div>";
    }
    echo "</div>";
}
drawSquares(5); // Малюємо 5 квадратів
?>
