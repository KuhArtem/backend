<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Завантаження зображень</title>
</head>
<body>
<h2>Форма для завантаження зображень</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <label for="image">Виберіть зображення для завантаження:</label><br>
    <input type="file" id="image" name="image"><br><br>
    <input type="submit" value="Завантажити зображення">
</form>

<?php
// Перевірка, чи було відправлено зображення
if ($_FILES['image']) {
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_size = $_FILES['image']['size'];

    // Директорія для збереження завантажених зображень
    $upload_dir = "uploads/";

    // Переміщення зображення до директорії на сервері
    if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
        echo "Зображення '$file_name' успішно завантажено.";
    } else {
        echo "Помилка при завантаженні зображення.";
    }
}
?>
</body>
</html>
