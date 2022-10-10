<?php
    require "pages/header.php";
    require "class/users.class.php";
    require 'config/verifySession.php';
    $user = new Users;
    $user->del($_POST['name-user']);
?>