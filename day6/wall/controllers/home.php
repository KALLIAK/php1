<?php

$messages = messages_all();

$inner = template('v_index', [
    'messages' => $messages
]);

$title = 'Главная';