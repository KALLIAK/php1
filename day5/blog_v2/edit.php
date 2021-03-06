<?php
include_once 'functions.php';
session_start();

$isAuth = isAuthorized();

if ($isAuth === false) {
    $_SESSION['returnUrl'] = $_SERVER['PHP_SELF'] . '?id=' . $_GET['id'];
    header('Location: login.php');
    exit();
}

$id = htmlspecialchars($_GET['id']) ?? null;

if ($id === null || !preg_match('/^[1-9]\d*$/', $id)) {
    echo 'Ошибка 404, не передано название';
    exit();
} else {
    $query = db_query("SELECT * FROM news WHERE id_news=:id", ['id' => $id]);
    $info = db_check_error($query);
    $message = $query->fetch();
    if (empty($message)) {
        echo 'Ошибка 404. Нет такой статьи!';
        exit();
    } else {
        $content = $message['content'];
        $title = $message['title'];
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim(htmlspecialchars($_POST['title']));
    $content = trim(htmlspecialchars($_POST['content']));
    $msg = '';

    if ($title === '' || $content === '') {
        $msg = 'Заполните все поля';
    } elseif (checker($title)) {
        $msg = 'Некорректное заглавие статьи!';
    } else {
        $query = db_query("UPDATE news SET title=:title, content=:content WHERE id_news='$id'", [
                'title' => $title,
                'content' => $content
        ]);
        $info = db_check_error($query);
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
    <?= $msg ?>
    <form action="edit.php?id=<?= $message['id_news'] ?>" method="post">
        <label for="title">Название:</label><br>
        <input name="title" value="<?= $title ?>"><br>
        <label for="content">Контент:</label><br>
        <textarea name="content"><?= $content ?></textarea><br>
        <input type="submit" value="Сохранить">
    </form>
</div>
</body>