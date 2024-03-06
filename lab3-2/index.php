<?php
session_start();

// Функція для перевірки авторизації
function checkAuth() {
    // Перевірка, чи встановлені змінні сесії для логіна та пароля
    if(isset($_SESSION['login']) && isset($_SESSION['password'])) {
        // Перевірка, чи введені дані правильні
        if($_SESSION['login'] === 'Admin' && $_SESSION['password'] === 'password') {
            return true; // Авторизація успішна
        }
    }
    return false; // Авторизація неуспішна
}

// Обробка входу користувача
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Перевірка введених даних
    if($login === 'Admin' && $password === 'password') {
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
    } else {
        echo "Невірний логін або пароль!";
    }
}

// Перевірка статусу авторизації
if(checkAuth()) {
    echo "Добрий день, {$_SESSION['login']}! <br>";
    echo '<a href="logout.php">Вийти</a>';
} else {
    // Вивід форми авторизації
    echo '
    <form method="post" action="">
        <label for="login">Логін:</label><br>
        <input type="text" id="login" name="login"><br>
        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Увійти">
    </form>
    ';
}
?>
