<?php
require_once('../../controllers/includes.php');

if( !empty($_POST['username']) && !empty($_POST['password']) ){
    $user = new User;
    $user->login();
}

header("Location: /");

?>