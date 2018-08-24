<?php
include_once 'functions.php';
session_start();

$isAuth = isAuthorized();

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
    <?php

    $query = db_query("SELECT * FROM news ORDER BY dt DESC");

    $info = db_check_error($query);

    $messages = $query->fetchAll();

    foreach ($messages as $message) {
        echo "<br><a href=\"post.php?id={$message['id_news']}\">{$message['title']}</a>";
        if ($isAuth === true) {
            echo " <a href=\"edit.php?id={$message['id_news']}\">&lt;- (edit)</a>";
        }
    }
    ?>

    <br>
    <?php if ($isAuth === true) { ?>
        <button><a href="add.php">Добавить</a></button>
        <button><a href="logout.php">Выход</a></button>
    <?php } else { ?>
        <button><a href="login.php">Авторизация</a></button>
    <?php } ?>
</div>
</body>