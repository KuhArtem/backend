<?php
session_start();

// Масив міст
$cities = array("New York", "London", "Paris");

// Отримання значення мови з GET або з кукі
$lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'ukr');

// Запис мови у куку на півроку
setcookie('lang', $lang, time() + (6 * 30 * 24 * 60 * 60));

// Встановлення мови
if ($lang == 'ukr') {
    $language = "Українська";
} else {
    $language = "English";
}

// Заповнення значень форми з сесії
$login = isset($_SESSION['formData']['login']) ? $_SESSION['formData']['login'] : '';
$gender = isset($_SESSION['formData']['gender']) ? $_SESSION['formData']['gender'] : '';
$city = isset($_SESSION['formData']['city']) ? $_SESSION['formData']['city'] : '';
$hobbies = isset($_SESSION['formData']['hobbies']) ? $_SESSION['formData']['hobbies'] : array();
$about = isset($_SESSION['formData']['about']) ? $_SESSION['formData']['about'] : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<h1>Registration Form</h1>
<form action="process_form.php" method="post" enctype="multipart/form-data">
    <label for="login">Login:</label>
    <input type="text" name="login" id="login" value="<?php echo $login; ?>"><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password"><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" id="confirm_password"><br>

    <label for="gender">Gender:</label>
    <select name="gender" id="gender">
        <option value="male" <?php if ($gender == 'male') echo 'selected'; ?>>Male</option>
        <option value="female" <?php if ($gender == 'female') echo 'selected'; ?>>Female</option>
    </select><br>

    <label for="city">City:</label>
    <select name="city" id="city">
        <?php foreach ($cities as $ct): ?>
            <option value="<?php echo $ct; ?>" <?php if ($city == $ct) echo 'selected'; ?>><?php echo $ct; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="hobbies">Hobbies:</label><br>
    <input type="checkbox" name="hobbies[]" value="Reading" <?php if (in_array('Reading', $hobbies)) echo 'checked'; ?>>Reading<br>
    <input type="checkbox" name="hobbies[]" value="Gaming" <?php if (in_array('Gaming', $hobbies)) echo 'checked'; ?>>Gaming<br>
    <input type="checkbox" name="hobbies[]" value="Cooking" <?php if (in_array('Cooking', $hobbies)) echo 'checked'; ?>>Cooking<br>

    <label for="about">About:</label><br>
    <textarea name="about" id="about" cols="30" rows="5"><?php echo $about; ?></textarea><br>

    <label for="photo">Photo:</label>
    <input type="file" name="photo" id="photo"><br>

    <input type="submit" value="Register">
</form>

<!-- Додавання іконок для вибору мови -->
<a href="index.php?lang=ukr"><img src="assets/images/ukr_icon.png" alt="Ukrainian Flag"></a>
<a href="index.php?lang=eng"><img src="assets/images/eng_icon.png" alt="English Flag"></a>

<!-- Виведення обраної мови -->
<p>Вибрана мова: <?php echo $language; ?></p>
</body>
</html>
