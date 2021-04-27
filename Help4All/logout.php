<?php
session_start();
function redirect_user($page = 'index.php'){
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
    $url = rtrim($url, '/\\');
    $url .= '/'.$page;
    header("Location: $url");
    exit();
}
$_SESSION = [];
session_destroy();
redirect_user();
?>