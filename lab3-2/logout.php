<?php

session_start();
session_unset(); // Видаляє всі змінні сесії
session_destroy(); // Знищує сесію
header("Location: index.php"); // Перенаправляє користувача на сторінку авторизації
exit;

