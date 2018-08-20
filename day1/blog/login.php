<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['login'] == 'admin' && $_POST['password'] == '12345') {
        $_SESSION['is_auth'] = true;
        if (isset($_POST['remember'])) {
            setcookie('login', hash('sha256', 'admin' . 'salt'), time() + 3600 * 24 * 7, '/');
            setcookie('password', hash('sha256', '12345' . 'salt'), time() + 3600 * 24 * 7, '/');
        }
        if (isset($_SESSION['returnUrl'])) {
            header('Location: ' . $_SESSION['returnUrl']);
            unset($_SESSION['returnUrl']);
            exit();
        } else {
            header('Location: index.php');
            exit();
        }
    } else {
        $msg = '<h1>Wrong login or password!</h1>';
    }
}
$msg = $msg ?? '';
?>

<!DOCTYPE html>
<html lang="en">
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
    <?= $msg?>
    <form method="post">
        <label for="name">Логин:</label><br>
        <input id="name" name="login"> <br>
        <label for="pass">Пароль:</label><br>
        <input type="password" id="pass" name="password"><br>
        <input type="checkbox" id="remember" name="remember">Запомнить<br>
        <input type="submit" value="Авторизоваться">
        <button><a href="index.php">На главную</a></button>
    </form>
</div>
</body>