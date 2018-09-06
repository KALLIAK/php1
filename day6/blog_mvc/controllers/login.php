<?php
$menu = menu();
$page_title = 'Авторизация';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = htmlspecialchars(trim($_POST['login']));
    $password = htmlspecialchars(trim($_POST['password']));
    $remember = $_POST['remember'] ?? false;
    if (authorize($login, $password, $remember)) {
        if (isset($_SESSION['returnUrl'])) {
            header('Location: ' . $_SESSION['returnUrl']);
            unset($_SESSION['returnUrl']);
            exit();
        } else {
            header('Location: index.php?c=home');
            exit();
        }
    } else {
        last_error('<h2>Wrong login or password!</h2>');
    }
}

$inner = template('v_login');