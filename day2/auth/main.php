<?php
session_start();
if (isset($_COOKIE['login'])
    && $_COOKIE['login'] == 'f9a81477552594c79f2abc3fc099daa896a6e3a3590a55ffa392b6000412e80b'
    && isset($_COOKIE['password'])
    && $_COOKIE['password'] == 'af838d6547c4ca7f4c5247320d0910e4c04da5d21eaccdb831ab31169b9005a1'
    ) {
    $_SESSION['is_auth'] = true;
}

if (!isset($_SESSION['is_auth']) || !$_SESSION['is_auth']) {
    header('Location: login.php');
    exit();
}

echo 'Closed info';
?>
<br>
<a href="logout.php">Выход</a>
