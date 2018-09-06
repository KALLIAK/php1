<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['user']) ?? '';
    $message = trim($_POST['message']);

    if ($user == '' || $message == '') {
        last_error('Fields cannot be empty!');
    } else {
        $result = message_insert($user, $message);
        if ($result) {
            echo 'Message added!';
        }
    }
} else {
    $user = '';
    $message = '';
}
$inner =  template('v_add', [
    'user' => $user,
    'message' => $message,
    'error' => last_error()
]);

$title = 'Добавление нового поста';
