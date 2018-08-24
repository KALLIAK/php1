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
        if ($_COOKIE['login'] == hash('sha256', 'admin' . 'salt')
            && $_COOKIE['password'] == hash('sha256', '12345' . 'salt')) {
            $isAuth = true;
            $_SESSION['is_auth'] = true;
        }
    }
    return $isAuth;
}

function db_connect()
{
    static $db;
    if ($db === null) {
        $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $db->exec('SET NAMES UTF8');
    }
    return $db;
}

function db_query($sql, $params = [])
{
    $db = db_connect();
    $query = $db->prepare($sql);
    $query->execute($params);
    return $query;
}

function db_check_error(PDOStatement $query)
{
    $info = $query->errorInfo();
    if ($info[0] !== PDO::ERR_NONE) {
        exit($info[2]);
    }
    return $info;
}