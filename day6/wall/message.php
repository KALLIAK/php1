<?php
include_once './models/messages.php';
include_once './models/common.php';
include_once './models/system.php';

$id = htmlspecialchars($_GET['id']) ?? null;

if ($id === null || !preg_match('/^[1-9]\d*$/', $id)) {
    last_error('Ошибка 404, не передано id');
} else {
    $message = messages_one($id);
    if (empty($message)) {
        last_error('Ошибка 404. Нет такой статьи!');
    }
}

$inner = template('v_message', [
   'message' => $message
]);

echo template('v_main', [
    'title' => 'Просмотр сообщения',
    'content' => $inner
]);