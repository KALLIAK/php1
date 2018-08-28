<?php

function template($view, $vars = [])
{
    extract($vars);
    ob_start();
    include "./views/$view.php";
    return ob_get_clean();
}