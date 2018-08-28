<?php
include_once './models/authorization.php';
include_once './models/news.php';
include_once './models/common.php';
session_start();

$isAuth = isAuthorized();

$messages = news_all();

if ($isAuth === true) {
    $inner = template('v_index_auth', [
        'messages' => $messages
    ]);
    echo template('v_main', [
        'title' => 'Главная',
        'content' => $inner
    ]);
} else {
    $inner = template('v_index_notauth', [
        'messages' => $messages
    ]);
    echo template('v_main', [
        'title' => 'Главная',
        'content' => $inner
    ]);
}
