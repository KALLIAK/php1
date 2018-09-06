<?php
include_once './models/common.php';
include_once './models/news.php';
include_once './models/authorization.php';
session_start();

$isAuth = isAuthorized();
$menu = menu();

if ($isAuth === false) {
    $_SESSION['returnUrl'] = $_SERVER['PHP_SELF'] . '?id=' . $_GET['id'];
    header('Location: login.php');
    exit();
}

$id = htmlspecialchars($_GET['id']) ?? null;

if ($id === null || !preg_match('/^[1-9]\d*$/', $id)) {
    last_error('Ошибка 404, не передано название');
    exit();
} else {
    $message = news_by_id($id);
    if (empty($message)) {
        last_error('Ошибка 404. Нет такой статьи!');
        exit();
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim(htmlspecialchars($_POST['title']));
    $content = trim(htmlspecialchars($_POST['content']));

    if ($title === '' || $content === '') {
        last_error('Заполните все поля');
    } else {
        news_edit($id, $title, $content);
        header("Location: index.php");
        exit();
    }
}

$title = $title ?? '';
$content = $content ?? '';

$inner = template('v_edit', [
    'message' => $message
]);
echo template('v_main', [
    'menu' => $menu,
    'title' => 'Редактирование новости',
    'content' => $inner
]);