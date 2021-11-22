<?php
    require 'pages/header.php';
    include 'cards.class.php';
 $card = new Cards();
 $list = $card->getAll();
 require "menuAdmin.php";
?>