<?php
include_once 'functions.php';
session_start();

$isAuth = isAuthorized();

if ($isAuth === false) {
    $_SESSION['returnUrl'] = $_SERVER['PHP_SELF'];
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim(htmlspecialchars($_POST['title']));
    $content = trim(htmlspecialchars($_POST['content']));
    $msg = '';

    if ($title == '' || $content == '') {
        last_error('Заполните все поля');
    } elseif (checker($title)) {
        last_error('Некорректное заглавие статьи!');
    } else {
        $query = db_query("INSERT INTO news (title, content) VALUES (:title, :content)",
            [
                'title' => $title,
                'content' => $content
            ]);

        $info = db_check_error($query);

        header("Location: index.php");
        exit();
    }
}
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
    <?=last_error()?>
    <form method="post">
        <label for="title">Название:</label><br>
        <input name="title" value="<?= $title ?>"><br>
        <label for="content">Контент:</label><br>
        <textarea name="content"><?= $content ?></textarea><br>
        <input type="submit" value="Добавить">
    </form>
</div>
</body>