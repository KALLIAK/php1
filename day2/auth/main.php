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

$msg = 'Closed info';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Main page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <?= $msg ?>
    <br>
    <button><a href="logout.php" style="text-decoration: none">Выход</a></button>
</div>
</body>
