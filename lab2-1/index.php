<?php
function generatePassword($length = 8) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()";
    $password = "";
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $password;
}

function checkPasswordStrength($password) {
    return preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*()])[A-Za-z\d@#$%^&*()]{8,}$/", $password);
}

// Обробка введення форми
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Заміна символів у тексті
    $text = $_POST["text"] ?? "";
    $search = $_POST["search"] ?? "";
    $replace = $_POST["replace"] ?? "";
    $result = str_replace($search, $replace, $text);

    // Сортування назв міст
    // Розділення рядка з назвами міст на масив за допомогою пробілів чи ком
    // Сортування назв міст
    $cities = $_POST['cities'] ?? '';
// Розділення рядка на масив за допомогою коми або пробілів
    $citiesArray = preg_split('/[\s,]+/', $cities);
// Видалення пробілів на початку та в кінці кожної назви міста
    $citiesArray = array_map('trim', $citiesArray);
// Видалення пустих елементів масиву
    $citiesArray = array_filter($citiesArray);
// Сортування масиву міст
    sort($citiesArray);
// Об'єднання масиву в рядок з відсортованими назвами міст
    $sortedCities = implode(', ', $citiesArray);

    // Вилучення імені файлу
    $filePath = $_POST["filePath"] ?? "";
    $fileName = pathinfo($filePath, PATHINFO_FILENAME);

    // Різниця між датами
    $date1 = isset($_POST["date1"]) ? DateTime::createFromFormat("d-m-Y", $_POST["date1"]) : null;
    $date2 = isset($_POST["date2"]) ? DateTime::createFromFormat("d-m-Y", $_POST["date2"]) : null;
    $diff = $date1 && $date2 ? $date1->diff($date2)->days : 0;

    // Генерація пароля
    $passwordLength = $_POST["passwordLength"] ?? 8;
    $generatedPassword = generatePassword($passwordLength);

    // Перевірка пароля
    $inputPassword = $_POST["inputPassword"] ?? "";
    $passwordStrength = checkPasswordStrength($inputPassword) ? "міцний" : "слабкий";
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна робота</title>
</head>
<body>

<form method="post">
    <h2>Заміна символів у тексті</h2>
    Текст: <input type="text" name="text" value="<?php echo htmlspecialchars($text); ?>"><br>
    Знайти: <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>"><br>
    Замінити: <input type="text" name="replace" value="<?php echo htmlspecialchars($replace); ?>"><br>
    Результат: <input type="text" value="<?php echo htmlspecialchars($result); ?>" disabled><br>

    <h2>Сортування назв міст</h2>
    Назви міст: <input type="text" name="cities" value="<?php echo htmlspecialchars($cities); ?>"><br>
    Впорядковані міста: <input type="text" value="<?php echo htmlspecialchars($sortedCities); ?>" disabled><br>

    <h2>Вилучення імені файлу</h2>
    Повний шлях до файлу: <input type="text" name="filePath" value="<?php echo htmlspecialchars($filePath); ?>"><br>
    Ім'я файлу: <input type="text" value="<?php echo htmlspecialchars($fileName); ?>" disabled><br>

    <h2>Різниця між датами</h2>
    Дата 1 (День-Місяць-Рік): <input type="text" name="date1" value="<?php echo htmlspecialchars($_POST["date1"]); ?>"><br>
    Дата 2 (День-Місяць-Рік): <input type="text" name="date2" value="<?php echo htmlspecialchars($_POST["date2"]); ?>"><br>
    Кількість днів між датами: <input type="text" value="<?php echo htmlspecialchars($diff); ?>" disabled><br>

    <h2>Генератор паролів</h2>
    Довжина паролю: <input type="text" name="passwordLength" value="<?php echo htmlspecialchars($passwordLength); ?>"><br>
    Згенерований пароль: <input type="text" value="<?php echo htmlspecialchars($generatedPassword); ?>" disabled><br>

    <h2>Перевірка пароля</h2>
    Введіть пароль для перевірки: <input type="text" name="inputPassword" value="<?php echo htmlspecialchars($inputPassword); ?>"><br>
    Міцність паролю: <input type="text" value="<?php echo htmlspecialchars($passwordStrength); ?>" disabled><br>
    <input type="submit" value="Виконати">
</form>

</body>
</html>
