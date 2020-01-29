<?php
session_start();
session_destroy();
if(count($_COOKIE) > 0){
    unset($_COOKIE['user_logged_in']);
    setcookie("user_logged_in", null, -1, "/");
}
header("Location: /")
?>