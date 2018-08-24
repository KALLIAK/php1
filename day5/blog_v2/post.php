<?php
include_once 'functions.php';

$id = htmlspecialchars($_GET['id']) ?? null;

if ($id === null || !preg_match('/^[1-9]\d*$/', $id)) {
    echo 'Ошибка 404, не передано id';
} else {
    $query = db_query("SELECT * FROM news WHERE id_news=:id", ['id' => $id]);
    $info = db_check_error($query);
    $message = $query->fetch();
    if (empty($message)) {
        echo 'Ошибка 404. Нет такой статьи!';
    }
}
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
    if (!empty($message)) {
        echo "<h2>{$message['title']}</h2>";
        echo $message['content'];
    } ?>
    <br>
    <button><a href="index.php">Назад</a></button>
</div>
</body>
