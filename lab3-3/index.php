<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сайт з коментарями, обробкою файлів та впорядкуванням слів</title>
</head>
<body>
<h2>Форма для коментарів</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="name">Ім’я:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="comment">Коментар:</label><br>
    <textarea id="comment" name="comment"></textarea><br><br>
    <input type="submit" value="Зберегти коментар">
</form>

<h2>Поточні коментарі</h2>
<table border="1">
    <tr>
        <th>Ім’я</th>
        <th>Коментар</th>
    </tr>
    <?php
    // Опрацювання форми для коментарів
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'] ?? '';
        $comment = $_POST['comment'] ?? '';

        if (!empty($name) && !empty($comment)) {
            $file = fopen("comments.txt", "a");
            fwrite($file, "{$name}: {$comment}\n");
            fclose($file);
        }
    }

    // Виведення поточних коментарів
    $file = fopen("comments.txt", "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            list($name, $comment) = explode(": ", $line, 2);
            echo "<tr><td>{$name}</td><td>{$comment}</td></tr>";
        }
        fclose($file);
    }
    ?>
</table>

<?php
// Завдання 2: Створення файлів зі словами та обробка
$file1_words = explode(" ", file_get_contents("file1.txt"));
$file2_words = explode(" ", file_get_contents("file2.txt"));

$unique_to_file1 = array_diff($file1_words, $file2_words);
$common_to_both = array_intersect($file1_words, $file2_words);

// Підрахунок кількості зустрічей кожного слова у файлі
$word_counts = array_count_values(array_merge($file1_words, $file2_words));
$common_to_both_more_than_twice = array_filter($word_counts, function($count) {
    return $count > 2;
});

// Запис результатів у файли
file_put_contents("unique_to_file1.txt", implode("\n", $unique_to_file1));
file_put_contents("common_to_both.txt", implode("\n", $common_to_both));
file_put_contents("common_to_both_more_than_twice.txt", implode("\n", array_keys($common_to_both_more_than_twice)));
?>

<h2>Форма для видалення файлу</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="delete_file">Введіть ім’я файлу для видалення:</label><br>
    <input type="text" id="delete_file" name="delete_file"><br><br>
    <input type="submit" value="Видалити файл">
</form>

<?php
// Видалення файлу, якщо відповідна форма була відправлена
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $delete_file = $_POST['delete_file'] ?? '';
    if (!empty($delete_file) && file_exists($delete_file)) {
        unlink($delete_file);
        echo "Файл '$delete_file' був успішно видалений.";
    }
}
?>

<h2>Форма для впорядкування слів за алфавітом</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="sort_file">Введіть ім’я файлу для впорядкування слів за алфавітом:</label><br>
    <input type="text" id="sort_file" name="sort_file"><br><br>
    <input type="submit" value="Впорядкувати слова">
</form>

<?php
// Завдання 3: Впорядкування слів за алфавітом
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sort_file = $_POST['sort_file'] ?? '';
    if (!empty($sort_file) && file_exists($sort_file)) {
        $words = file($sort_file, FILE_IGNORE_NEW_LINES);
        sort($words);
        file_put_contents("sorted_words.txt", implode("\n", $words));
        echo "Слова в файлі '$sort_file' були впорядковані за алфавітом і збережені в файлі 'sorted_words.txt'.";
    }
}
?>
</body>
</html>
