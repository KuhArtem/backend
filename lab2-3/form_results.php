<?php
session_start();

// Перевірка, чи існують дані у сесії
if (isset($_SESSION['formData'])) {
    $formData = $_SESSION['formData'];

    // Отримання даних з сесії
    $login = isset($formData['login']) ? $formData['login'] : '';
    $gender = isset($formData['gender']) ? $formData['gender'] : '';
    $city = isset($formData['city']) ? $formData['city'] : '';
    $hobbies = isset($formData['hobbies']) ? implode(", ", $formData['hobbies']) : '';
    $about = isset($formData['about']) ? $formData['about'] : '';
    $photo = isset($formData['photo']) ? $formData['photo'] : ''; // Отримуємо шлях до фото

    // Очищення даних з сесії після відображення результатів
    unset($_SESSION['formData']);
} else {
    // Якщо даних немає у сесії, перенаправляємо користувача на головну сторінку
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Results</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<h1>Form Results</h1>
<p><strong>Login:</strong> <?php echo $login; ?></p>
<p><strong>Gender:</strong> <?php echo $gender; ?></p>
<p><strong>City:</strong> <?php echo $city; ?></p>
<p><strong>Hobbies:</strong> <?php echo $hobbies; ?></p>
<p><strong>About:</strong> <?php echo $about; ?></p>

<!-- Відображення завантаженого фото -->
<?php if (!empty($photo)): ?>
    <p><strong>Photo:</strong><br><img src="<?php echo $photo; ?>" alt="User Photo"></p>
<?php endif; ?>


</body>
</html>
