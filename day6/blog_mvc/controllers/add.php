<?php
$isAuth = isAuthorized();
$menu = menu();
$page_title = 'Добавление новости';

if ($isAuth === false) {
    $_SESSION['returnUrl'] = $_SERVER['PHP_SELF'] . '?c=add';
    header('Location: index.php?c=login');
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
        header("Location: index.php?c=home");
        exit();
    }
}
$title = $title ?? '';
$content = $content ?? '';

$inner = template('v_add', [
    'title' => $title,
    'content' => $content
]);
