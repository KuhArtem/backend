<?php
session_start();

// Перевірка, чи була надіслана форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримання даних з форми
    $login = $_POST['login'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : array();
    $about = $_POST['about'];

    // Зберігання даних у сесії
    $_SESSION['formData'] = array(
        'login' => $login,
        'gender' => $gender,
        'city' => $city,
        'hobbies' => $hobbies,
        'about' => $about,
        'photo' => $_FILES['photo']['tmp_name'] // Зберігання тимчасового шляху до завантаженого файлу
    );

    // Перенаправлення на сторінку результатів
    header('Location: form_results.php');
    exit;
}
?>
