<?php
    include 'cards.class.php';

function timeExpected($x){
    $card = new Cards();
    $list = $x;
    $time = 0;
    foreach($list as $item){
        $time += $item['time_expected'];
    }
    return $time;
}


function timeExpectedDayly($yaer, $month){
    $card = new Cards();
    $days_month = cal_days_in_month(CAL_GREGORIAN, $month , $yaer);

    return timeExpected($card->getDayly()) * $days_month;
}


function timeExpectedWeekly($yaer, $current_month){
    $card = new Cards();
    $month = [];

    for($i = 1; $i <= 12; $i++){
        $date = $yaer . '-' . $i. '-01';

        $start = new DateTime($date);
        $end = new DateTime($start->format('Y-m-t'));
        $days = $start->diff($end, true)->days;

        $month[$i] = intval($days / 7) + ($start->format('N') + $days % 7 >= 7);
    }

    return timeExpected($card->getWeekly())* $month[$current_month];

}

function timeExpectedFortnightly(){
    $card = new Cards();
    $list = $card->getFortnightly();
    $time = 0;
    foreach($list as $item){
        $time += $item['time_expected'];
    }
    
    return $time * 2;
}

function timeExpectedMonthly(){
    $card = new Cards();
    return timeExpected($card->getMonthly());
}



function totalTimeExpected($y, $m){
    return timeExpectedDayly($y, $m) + timeExpectedWeekly($y, $m) + timeExpectedFortnightly() + timeExpectedMonthly();
}
