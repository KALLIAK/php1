<?php
$info = [];

//echo '<pre>';
//print_r($_SERVER);
//echo '</pre>';

$info[] = date('Y-m-d H:i:s');
$info[] = $_SERVER['REMOTE_ADDR'];
$info[] = $_SERVER['REQUEST_URI'];
$info[] = $_SERVER['HTTP_REFERER'];
$info[] = $_SERVER['HTTP_USER_AGENT'];

$str = implode('@-@', $info);
echo $str;

file_put_contents('log.txt', $str."\n", FILE_APPEND);