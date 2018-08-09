<?php
function checker($fname)
{
    return preg_match('/[^0-9A-Za-z-_ ]/', $fname);
}

function myhash($str)
{
    return hash('sha256', $str . 'salt');
}