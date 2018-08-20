<?php
include_once('functions.php');

if (!news_check_title('Тайтл')) {
    $err = news_last_error();
    echo $err;
} else {
    $err = '';
}
