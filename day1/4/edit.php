<?php
include_once 'functions.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $title = htmlspecialchars($_GET['fname']) ?? null;
    $oldTitle = $title;

    if ($title == null) {
        echo 'Ошибка 404, не передано название';
        exit();
    } elseif (checker($title)) {
        echo 'Ошибка 404. Неправильный GET аргумент!';
        exit();
    } elseif (!file_exists('data/' . $title)) {
        echo 'Ошибка 404. Нет такой статьи!';
        exit();
    } else {
        $content = file_get_contents('data/' . $title);
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim(htmlspecialchars($_POST['title']));
    $content = trim(htmlspecialchars($_POST['content']));
    $oldTitle = $_POST['old_title'];
    $msg = '';

    if ($title == '' || $content == '') {
        $msg = 'Заполните все поля';
    } elseif (checker($title)) {
        $msg = 'Некорректное заглавие статьи!';
    } elseif (file_exists('data/' . $title) && $title != $oldTitle) {
        $msg = 'Такая статья уже есть!';
    } else {
        if ($title != $oldTitle) {
            unlink('data/' . $oldTitle);
        }
        file_put_contents('data/' . $title, $content);
        header("Location: a.php");
        exit();
    }
}

$msg = $msg ?? '';
$title = $title ?? '';
$content = $content ?? '';
$oldTitle = $oldTitle ?? '';

echo $msg;
?>
<form action="edit.php" method="post">
    <label for="title">Название:</label><br>
    <input name="title" value="<?= $title ?>"><br>
    <label for="content">Контент:</label><br>
    <textarea name="content"><?= $content ?></textarea><br>
    <input type="submit" value="Сохранить">
    <input name="old_title" value="<?= $oldTitle ?>" hidden>
</form>