<?php
    include 'cards.class.php';

function timeReal($x){
    $card = new Cards();
    $list = $x;
    $time = 0;
    foreach($list as $item){
        $time += $item['execution_time'];
    }
    return $time;
}


function timeRealDayly($yaer, $month){
    $card = new Cards();
    $days_month = cal_days_in_month(CAL_GREGORIAN, $month , $yaer);

    return timeReal($card->getDayly()) * $days_month;
}


function timeRealWeekly($yaer, $current_month){
    $card = new Cards();
    $month = [];

    for($i = 1; $i <= 12; $i++){
        $date = $yaer . '-' . $i. '-01';

        $start = new DateTime($date);
        $end = new DateTime($start->format('Y-m-t'));
        $days = $start->diff($end, true)->days;

        $month[$i] = intval($days / 7) + ($start->format('N') + $days % 7 >= 7);
    }

    return timeReal($card->getWeekly())* $month[$current_month];

}

function timeRealFortnightly(){
    $card = new Cards();
    $list = $card->getFortnightly();
    $time = 0;
    foreach($list as $item){
        $time += $item['execution_time'];
    }
    
    return $time * 2;
}

function timeRealMonthly(){
    $card = new Cards();
    return timeReal($card->getMonthly());
}

function totalRealTime($y, $m){
    return timeRealDayly($y, $m) + timeRealWeekly($y, $m) + timeRealFortnightly() + timeRealMonthly();
}

echo totalRealTime(2021, 1);