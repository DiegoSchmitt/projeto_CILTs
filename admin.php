<?php
    require 'pages/header.php';
    include 'cards.class.php';
    include 'users.class.php';
    include 'execute.class.php';
    require "timeExpected.php";
    require 'verifySession.php';

    $user = new Users();
    $card = new Cards();
    $list = $card->getAll();
    $usersList = $user->getAll();
    $list1 = count($card->getStatus(1));
    $list2 = count($card->getStatus(2));
?>
    <div class="menu-admin">
        <?php
            require "menuAdmin.php";
        ?>
    </div>
    <div class="chart">
        <div class="chart1">
        <?php
            require "chartStatus.php";
        ?>
        </div>
        <div class="chart2">
        <?php
            require "chartMonthlyTime.php";
        ?>
        </div>
    </div>