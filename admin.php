<?php
    require 'pages/header.php';
    include 'class/cards.class.php';
    include 'class/users.class.php';
    include 'class/execute.class.php';
    require "timeExpected.php";
    require 'config/verifySession.php';

    $user = new Users();
    $card = new Cards();
    $list = $card->getAll();
    $usersList = $user->getAll();
    $list1 = count($card->getStatus(1));
    $list2 = count($card->getStatus(2));
?>
    <link rel="stylesheet" href="assets/css/style.css">
    <div class="menu-admin">
        <?php
            require "pages/menuAdmin.php";
        ?>
    </div>
    <div class="chart">
        <div class="chart1">
        <?php
            require "grafics/chartStatus.php";
        ?>
        </div>
        <div class="chart2">
        <?php
            require "grafics/chartMonthlyTime.php";
        ?>
        </div>
    </div>