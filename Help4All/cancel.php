<?php

function redirect_user($page = 'index.php'){
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    $url = rtrim($url, '/\\');
    $url .= '/'.$page;
    header("Location: $url");
    exit();
}

redirect_user("account.php");

?>