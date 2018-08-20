<?php
include_once 'functions.php';
session_start();

$isAuth = isAuthorized();

if ($isAuth === false) {
    $_SESSION['returnUrl'] = $_SERVER['PHP_SELF'] . '?fname=' . $_GET['fname'];
    header('Location: login.php');
    exit();
}

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
    } elseif (checker($title) || checker($oldTitle)) {
        $msg = 'Некорректное заглавие статьи!';
    } elseif (file_exists('data/' . $title) && $title != $oldTitle) {
        $msg = 'Такая статья уже есть!';
    } else {
        if ($title != $oldTitle) {
            unlink('data/' . $oldTitle);
        }
        file_put_contents('data/' . $title, $content);
        header("Location: index.php");
        exit();
    }
}

$msg = $msg ?? '';
$title = $title ?? '';
$content = $content ?? '';
$oldTitle = $oldTitle ?? '';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Login form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/styles.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <?= $msg ?>
    <form action="edit.php" method="post">
        <label for="title">Название:</label><br>
        <input name="title" value="<?= $title ?>"><br>
        <label for="content">Контент:</label><br>
        <textarea name="content"><?= $content ?></textarea><br>
        <input type="submit" value="Сохранить">
        <input name="old_title" value="<?= $oldTitle ?>" hidden>
    </form>
</div>
</body>