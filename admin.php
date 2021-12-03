<?php
    require 'pages/header.php';
    include 'cards.class.php';
    include 'users.class.php';
$user = new Users();
$card = new Cards();
$list = $card->getAll();
$usersList = $user->getAll();
$list1 = count($card->getStatus(1));
$list2 = count($card->getStatus(2));
?>
<div class="container-admin">
    <div class="menu-admin">
        <?php
            require "menuAdmin.php";
        ?>
    </div>
</div>
<div class="chart">
        <?php
            require "chartStatus.php";
        ?>
</div>