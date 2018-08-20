<?php

function news_check_title($title)
{
    $title = trim($title);

    if ($title == '') {
        news_last_error('Тайтл не может быть пустым');
        return false;
    } elseif (mb_strlen($title) < 6) {
        news_last_error('Длина тайтла меньше 6 символов');
        return false;
    } else {
        return true;
    }

}

function news_last_error($msg = null)
{
    static $last_error = null;
    if ($msg != null) {
        $last_error = $msg;
    } else {
        return $last_error;
    }
}