<?php
include_once './models/authorization.php';
include_once './models/news.php';
include_once './models/common.php';
session_start();
$err404 = false;

$controller = $_GET['c'] ?? 'home';

if (!check_controller($controller) || !file_exists("./controllers/$controller.php")) {
    $err404 = true;
} else {
    include_once "./controllers/$controller.php";
}

if ($err404) {
    $page_title = 'Ошибка 404';
    $inner = template('v_err404');
    $menu = menu();
}

echo template('v_main', [
    'menu' => $menu,
    'title' => $page_title,
    'content' => $inner
]);

