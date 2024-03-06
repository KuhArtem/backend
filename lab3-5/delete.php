<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Видалення користувача</title>
</head>
<body>
<h2>Форма для видалення користувача</h2>
<form action="delete.php" method="post">
    <label for="delete_login">Логін:</label><br>
    <input type="text" id="delete_login" name="login"><br>
    <label for="delete_password">Пароль:</label><br>
    <input type="password" id="delete_password" name="password"><br><br>
    <input type="submit" value="Видалити користувача">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($login === 'admin' && $password === 'admin') {
        $user_folder = "./users/{$login}/";
        if (file_exists($user_folder)) {
            function rrmdir($dir) {
                if (is_dir($dir)) {
                    $objects = scandir($dir);
                    foreach ($objects as $object) {
                        if ($object != "." && $object != "..") {
                            if (filetype($dir . "/" . $object) == "dir") rrmdir($dir . "/" . $object); else unlink($dir . "/" . $object);
                        }
                    }
                    reset($objects);
                    rmdir($dir);
                }
            }
            rrmdir($user_folder);
            echo "Користувач '{$login}' успішно вилучений.";
        } else {
            echo "Помилка: Користувача '{$login}' не знайдено.";
        }
    } else {
        echo "Помилка: Неправильний логін або пароль.";
    }
}
?>
</body>
</html>
