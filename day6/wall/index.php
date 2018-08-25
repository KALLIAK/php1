<?php
include_once './models/messages.php';

$messages = messages_all();

include './views/v_index.php';