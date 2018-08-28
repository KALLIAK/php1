<?php
include_once './models/messages.php';
include_once './models/system.php';

$messages = messages_all();

$inner = template('v_index', [
    'messages' => $messages
]);

echo template('v_main', [
    'title' => 'Главная',
    'content' => $inner
]);