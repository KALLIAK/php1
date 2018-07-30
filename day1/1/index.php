<?php
$f = fopen('1.txt', 'r');
$part = 1;

while (!feof($f)) {
    $str = fread($f, $part);
    if ($str == "\n") {
        echo '<br/>';
    }
    else echo $str;
}
