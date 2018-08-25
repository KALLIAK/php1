<?php
include_once './models/messages.php';
include_once './models/common.php';

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
echo last_error();

include './views/v_add.php';