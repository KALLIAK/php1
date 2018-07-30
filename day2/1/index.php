<?php

setcookie('login', 'admin', time() + 3600 * 24 * 7);

var_dump($_COOKIE);
