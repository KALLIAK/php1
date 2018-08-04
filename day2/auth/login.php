<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['login'] == 'admin' && $_POST['password'] == '12345') {
        $_SESSION['is_auth'] = true;
        if (isset($_POST['remember']) && $_POST['remember']) {
            setcookie('login', hash('sha256', 'admin' . 'salt'), time() + 3600 * 24 * 7);
            setcookie('password', hash('sha256', '12345' . 'salt'), time() + 3600 * 24 * 7);
        }
        header('Location: main.php');
        exit();
    } else {
        echo '<h1>Wrong login or password!</h1>';
    }
}

?>
<form method="post">
    <label for="name">Логин:</label><br>
    <input id="name" name="login"> <br>
    <label for="pass">Пароль:</label><br>
    <input type="password" id="pass" name="password"><br>
    <input type="checkbox" id="remember" name="remember">Запомнить<br>
    <input type="submit" value="Авторизация">
</form>
