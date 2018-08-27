<?php

function authorize($login, $password, $remember = false)
{
    if ($login == 'admin' && $password == '12345') {
        $_SESSION['is_auth'] = true;
        if ($remember) {
            setcookie('login', hash('sha256', 'admin' . 'salt'), time() + 3600 * 24 * 7, '/');
            setcookie('password', hash('sha256', '12345' . 'salt'), time() + 3600 * 24 * 7, '/');
        }
        return true;
    } else {
        return false;
    }
}

function isAuthorized()
{
    $isAuth = false;

    if (isset($_SESSION['is_auth']) && $_SESSION['is_auth'] === true) {
        $isAuth = true;
    } elseif (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
        if ($_COOKIE['login'] == hash('sha256', 'admin' . 'salt')
            && $_COOKIE['password'] == hash('sha256', '12345' . 'salt')) {
            $isAuth = true;
            $_SESSION['is_auth'] = true;
        }
    }
    return $isAuth;
}
