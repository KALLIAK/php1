<?php
include_once './models/authorization.php';
include_once './models/news.php';
session_start();

$isAuth = isAuthorized();

$messages = news_all();

if ($isAuth === true) {
    include './views/v_index_auth.php';
} else {
    include './views/v_index_notauth.php';
}

