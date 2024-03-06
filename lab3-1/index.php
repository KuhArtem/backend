<?php
session_start();

// Перевіряємо, чи був вибраний розмір шрифту раніше
if(isset($_SESSION['font_size'])) {
    $font_size = $_SESSION['font_size'];
} else {
    // Якщо розмір шрифту не встановлено, встановлюємо його за замовчуванням
    $font_size = 'medium'; // Можна встановити будь-яке значення за замовчуванням
}

// Обробляємо натискання посилань і зберігаємо розмір шрифту в сесії
if(isset($_GET['font_size'])) {
    $font_size = $_GET['font_size'];
    $_SESSION['font_size'] = $font_size;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Font Size Example</title>
    <style>
        /* CSS для різних розмірів шрифтів */
        .big {
            font-size: 24px;
        }
        .medium {
            font-size: 18px;
        }
        .small {
            font-size: 14px;
        }
    </style>
</head>
<body style="font-size: <?php echo $font_size; ?>;">

<a href="?font_size=big">Великий шрифт</a> |
<a href="?font_size=medium">Середній шрифт</a> |
<a href="?font_size=small">Маленький шрифт</a>

<h1>Заголовок</h1>
<p>Текст на сторінці залежно від розміру шрифту.</p>
</body>
</html>
