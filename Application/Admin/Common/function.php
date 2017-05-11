<?php
/**
 * Created by PhpStorm.
 * User: ju
 * Date: 2017/1/6
 * Time: 10:07
 */

/**
 * 根据地址ID获取地址名称
 * @param $ids
 * @return bool|mixed
 */
function getDetails($ids){
    $map['code'] = array('in',$ids);
    $result = M('daili_address')->where($map)->select();
    if(!empty($result)){
        return $result;
    }else{
        return false;
    }

}
function addFlow($data){
    $cashFlow = D("CashFlow");
    $addFlow = $cashFlow->addFlow($data['pay_id'],$data['rec_id'],$data['type'],$data['money'],$data['remarks'],$data['fee']);
    if ($addFlow){
        return true;
    }else{
        return false;
    }
}
/**
 * 获取星期几信息
 * @param $time
 * @param int $i
 * @return string
 */
function getTimeWeek($time, $i = 0) {
    $week_array = array("一", "二", "三", "四", "五", "六", "日");
    $oneDay = 24 * 60 * 60;
    return $week = "周" . $week_array[date("w", $time + $oneDay * $i)];
}
//$time=time();
//echo getTimeWeek($tiem);

/**
 * print_r()函数简化
 */
function p($str){
    echo '<div style="border: 1px solid bisque;border-bottom-color:red;border-right-color:red;color:green;background-color: bisque "><pre>';
    print_r($str);
    echo '</pre></div>';
}
/**
 * var_dump()函数简化
 */
function v($str){
    echo '<div style="border: 1px solid bisque;color:green;background-color: bisque "><pre>';
    var_dump($str);
    echo '</pre></div>';
}
