<?php
include_once './models/authorization.php';
include_once './models/news.php';
include_once './models/common.php';
session_start();

$controller = $_GET['c'] ?? 'home';
include_once "./controllers/$controller.php";

echo template('v_main', [
    'menu' => $menu,
    'title' => $page_title,
    'content' => $inner
]);

