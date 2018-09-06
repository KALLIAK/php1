<?php
include_once './models/common.php';
include_once './models/news.php';
include_once './models/authorization.php';
session_start();

$isAuth = isAuthorized();
$menu = menu();

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
    } else {
        news_add($title, $content);
        header("Location: index.php");
        exit();
    }
}
$title = $title ?? '';
$content = $content ?? '';

$inner = template('v_add', [
    'title' => $title,
    'content' => $content
]);
echo template('v_main', [
    'menu' => $menu,
    'title' => 'Добавление новости',
    'content' => $inner
]);