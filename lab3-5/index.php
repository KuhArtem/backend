<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Керування користувачами</title>
</head>
<body>
<h2>Форма для створення користувача</h2>
<form action="index.php" method="post">
    <label for="login">Логін:</label><br>
    <input type="text" id="login" name="login"><br>
    <label for="password">Пароль:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" name="create_user" value="Створити користувача">
</form>

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
    if (isset($_POST['create_user'])) {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';

        $user_folder = "./users/{$login}/";
        if (!file_exists($user_folder)) {
            mkdir($user_folder, 0777, true);
            mkdir($user_folder . "video", 0777, true);
            mkdir($user_folder . "music", 0777, true);
            mkdir($user_folder . "photo", 0777, true);
            file_put_contents($user_folder . "video/video1.mp4", "");
            file_put_contents($user_folder . "music/music1.flac", "");
            file_put_contents($user_folder . "photo/photo1.jpg", "");

            echo "Користувач '{$login}' успішно створений.";
        } else {
            echo "Помилка: Користувач з ім'ям '{$login}' вже існує.";
        }
    }
}
?>
</body>
</html>
