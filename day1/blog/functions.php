<?php
/**
 * @param $fname
 * @return false|int
 */
function checker($fname)
{
    return preg_match('/[^0-9A-Za-z-_ ]/', $fname);
}

/**
 * @return bool
 */
function isAuthorized()
{
    $isAuth = false;

    if (isset($_SESSION['is_auth']) && $_SESSION['is_auth'] === true) {
        $isAuth = true;
    } elseif (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
        if ($_COOKIE['login'] == 'f9a81477552594c79f2abc3fc099daa896a6e3a3590a55ffa392b6000412e80b'
            && $_COOKIE['password'] == 'af838d6547c4ca7f4c5247320d0910e4c04da5d21eaccdb831ab31169b9005a1') {
            $isAuth = true;
            $_SESSION['is_auth'] = true;
        }
    }
    return $isAuth;
}