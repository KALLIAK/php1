<?php
function last_error($error = '')
{
    static $lastError = '';
    if ($error === '') {
        return $lastError;
    }
    $lastError = $error;
}

function checker($fname)
{
    return preg_match('/[^0-9A-Za-z-_ :]/', $fname);
}
