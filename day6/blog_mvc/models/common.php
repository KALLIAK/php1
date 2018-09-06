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

function template($view, $vars = [])
{
    extract($vars);
    ob_start();
    include "./views/{$view}.php";
    return ob_get_clean();
}

function menu()
{
    $menu = null;
    $isAuth = isAuthorized();
    if ($isAuth === true) {
        $menu = '<li><a href="index.php">Главная</a></li>
                <li><a href="add.php">Новый пост</a></li>
                <li><a href="logout.php">Выход</a></li>';
    } else {
        $menu = '<li><a href="index.php">Главная</a></li>
                <li><a href="add.php">Новый пост</a></li>
                <li><a href="login.php">Авторизация</a></li>';
    }
    return $menu;
}