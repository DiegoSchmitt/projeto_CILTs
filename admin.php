<?php
    require 'pages/header.php';
    include 'cards.class.php';
    include 'users.class.php';
$user = new Users();
$card = new Cards();
$list = $card->getAll();
$usersList = $user->getAll();
require "menuAdmin.php";
?>