<?php
session_start();
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Приклад збереження даних форми в сесії
    $_SESSION['cities'] = isset($_POST['cities']) ? sortCities($_POST['cities']) : '';
    $_SESSION['filename'] = isset($_FILES['file']['name']) ? extractFileName($_FILES['file']['name']) : '';

    // Редирект назад на index.php з інформацією про успішне відправлення
    header('Location: index.php?success=1');
    exit();
}
?>