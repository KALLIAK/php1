<?php
include_once './models/messages.php';
include_once './models/common.php';

$id = htmlspecialchars($_GET['id']) ?? null;

if ($id === null || !preg_match('/^[1-9]\d*$/', $id)) {
    last_error('Ошибка 404, не передано id');
} else {
    $message = messages_one($id);
    if (empty($message)) {
        last_error('Ошибка 404. Нет такой статьи!');
    }
}

include './views/v_message.php';