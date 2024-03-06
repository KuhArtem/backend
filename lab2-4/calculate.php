<?php

include 'Function/func.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = $_POST["x"];
    $y = $_POST["y"];

    // Виклик функцій
    $sin_x = my_sin($x);
    $cos_x = my_cos($x);
    $tg_x = my_tg($x);
    $pow_xy = my_pow($x, $y);
    $factorial_x = factorial($x);

    // Виведення результатів
    echo "sin(x) = $sin_x<br>";
    echo "cos(x) = $cos_x<br>";
    echo "tan(x) = $tg_x<br>";
    echo "x^y = $pow_xy<br>";
    echo "x! = $factorial_x<br>";
}

?>
