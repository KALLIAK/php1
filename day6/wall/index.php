<?php
include_once './models/messages.php';
include_once './models/common.php';
include_once './models/system.php';
session_start();

$controller = $_GET['c'] ?? 'home';
include_once "./controllers/$controller.php";

echo template('v_main', [
    'title' => $title,
    'content' => $inner
]);