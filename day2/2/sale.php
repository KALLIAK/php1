<?php
$now = time();

if (!isset($_COOKIE['sale'])) {
    setcookie('sale', $now, time() + 3600*2);
} else {
    $remTime = $_COOKIE['sale'] - $now + 3600;
}
$remTime = $remTime ?? '';
echo $remTime;