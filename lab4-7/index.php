<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager</title>
</head>
<body>
<h2>File Manager</h2>
<form action="" method="post">
    <label for="filename">Enter filename:</label><br>
    <input type="text" id="filename" name="filename"><br>
    <label for="content">Enter content:</label><br>
    <textarea id="content" name="content" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Read" name="read">
    <input type="submit" value="Write" name="write">
    <input type="submit" value="Erase" name="erase">
</form>

<?php
class FileManager
{
    public static $dir = "text";

    public static function readFromFile($filename)
    {
        $filepath = self::$dir . '/' . $filename;
        if (file_exists($filepath)) {
            $content = file_get_contents($filepath);
            echo "Content of $filename: <br>$content <br>";
        } else {
            echo "File $filename does not exist <br>";
        }
    }

    public static function writeToFile($filename, $content)
    {
        $filepath = self::$dir . '/' . $filename;
        $file = fopen($filepath, "a"); // 'a' mode appends to the file
        fwrite($file, $content);
        fclose($file);
        echo "Content written to $filename <br>";
    }

    public static function eraseFileContent($filename)
    {
        $filepath = self::$dir . '/' . $filename;
        $file = fopen($filepath, "w"); // 'w' mode truncates the file
        fclose($file);
        echo "Content of $filename erased <br>";
    }
}

// Create text directory if it doesn't exist
if (!is_dir(FileManager::$dir)) {
    mkdir(FileManager::$dir);
}

if (isset($_POST['read'])) {
    $filename = $_POST['filename'];
    FileManager::readFromFile($filename);
}

if (isset($_POST['write'])) {
    $filename = $_POST['filename'];
    $content = $_POST['content'];
    FileManager::writeToFile($filename, $content);
}

if (isset($_POST['erase'])) {
    $filename = $_POST['filename'];
    FileManager::eraseFileContent($filename);
}
?>
</body>
</html>
