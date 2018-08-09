<?php
include_once 'functions.php';
$fname = $_GET['fname'] ?? null;

if ($fname == null) {
    echo 'Ошибка 404, не передано название';
} elseif (checker($fname)) {
    echo 'Ошибка 404. Неправильный GET аргумент!';
} elseif (!file_exists('data/' . $fname)) {
    echo 'Ошибка 404. Нет такой статьи!';
} else {
    $content = file_get_contents('data/' . $fname);

    $msg = nl2br($content);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Login form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <?= $msg ?>
</div>
</body>
