<?php

function last_error($error = '')
{
    static $lastError = '';
    if ($error === '') {
        return $lastError;
    }
    $lastError = $error;
}