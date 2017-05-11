<?php

function getTimeWeek($time, $i = 0) {
    $week_array = array("日","一", "二", "三", "四", "五", "六");
    $oneDay = 24 * 60 * 60;
    return $week = "周" . $week_array[date("w", $time + $oneDay * $i)];
}
$time=time();
echo getTimeWeek($time);
?>