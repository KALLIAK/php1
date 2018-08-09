<?php
include_once 'functions.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim(htmlspecialchars($_POST['title']));
    $content = trim(htmlspecialchars($_POST['content']));
    //$list = scandir('data');
    //$isUnique = true;
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
