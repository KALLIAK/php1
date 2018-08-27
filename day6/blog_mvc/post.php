<?php
include_once './models/common.php';
include_once './models/news.php';

$id = htmlspecialchars($_GET['id']) ?? null;

if ($id === null || !preg_match('/^[1-9]\d*$/', $id)) {
    last_error('Ошибка 404, не передано id');
} else {
    $message = news_by_id($id);
    if (empty($message)) {
        last_error('Ошибка 404. Нет такой статьи!');
    }
}

include './views/v_post.php';