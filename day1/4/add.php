<?php
include_once 'functions.php';
session_start();

$isAuth = false;

if (isset($_SESSION['is_auth']) && $_SESSION['is_auth'] === true) {
    $isAuth = true;
} elseif (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
    if ($_COOKIE['login'] == 'f9a81477552594c79f2abc3fc099daa896a6e3a3590a55ffa392b6000412e80b'
        && $_COOKIE['password'] == 'af838d6547c4ca7f4c5247320d0910e4c04da5d21eaccdb831ab31169b9005a1') {
        $isAuth = true;
        $_SESSION['is_auth'] = true;
    }
}

if ($isAuth === false) {
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim(htmlspecialchars($_POST['title']));
    $content = trim(htmlspecialchars($_POST['content']));
    $msg = '';

    if ($title == '' || $content == '') {
        $msg = 'Заполните все поля';
    } elseif (checker($title)) {
        $msg = 'Некорректное заглавие статьи!';
    } elseif (file_exists('data/' . $title)) {
        $msg = 'Неуникальное название файла!';
    } else {
        file_put_contents('data/' . $title, $content);
        header("Location: index.php");
        exit();
    }
}
$msg = $msg ?? '';
$title = $title ?? '';
$content = $content ?? '';
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
    <form method="post">
        <label for="title">Название:</label><br>
        <input name="title" value="<?= $title ?>"><br>
        <label for="content">Контент:</label><br>
        <textarea name="content"><?= $content ?></textarea><br>
        <input type="submit" value="Добавить">
    </form>
    <?php echo $msg; ?>
</div>
</body>