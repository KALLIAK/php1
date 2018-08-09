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
<?php

$list = scandir('data');

foreach ($list as $fname) {
    if (is_file("data/$fname")) {
        echo "<a href=\"post.php?fname=$fname\">$fname</a> <a href=\"edit.php?fname=$fname\">edit</a> <br>";
    }
}
?>

    <br>
    <button><a href="add.php" style="text-decoration: none; color: #000;">Добавить</a></button>
    <button><a href="logout.php" style="text-decoration: none; color: black">Выход</a></button>
</div>
</body>