<?php
// autoload.php

// Регистрируем функцию автозагрузки классов
spl_autoload_register(function ($class) {
    // Преобразуем пространство имен в соответствующий путь к файлу
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    // Подключаем файл класса
    require_once __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
});
