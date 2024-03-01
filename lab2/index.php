<?php
include 'functions.php';
if (isset($_GET['lang'])) {
    setcookie('lang', $_GET['lang'], time() + (86400 * 30), "/");
    $_COOKIE['lang'] = $_GET['lang']; // Update current session to reflect the change immediately
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab Work 2</title>
</head>
<body>
<form action="process_form.php" method="post" enctype="multipart/form-data">
    <!-- Your form fields here -->
    <input type="submit" value="Submit">
</form>
<a href="index.php?lang=en">English</a>
<a href="index.php?lang=uk">Українська</a>
</body>
</html>
