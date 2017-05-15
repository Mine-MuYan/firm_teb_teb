<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>兔尔宝加盟商平台</title>
    <link rel="stylesheet" href="/Public/home/css/common.css">
    <link rel="stylesheet" href="/Public/home/css/home.css">
    <script src="/Public/home/js/jquery.js"></script>
    <script src="/Public/home/js/common.js"></script>
    <script src="/Public/home/layer/layer.js"></script>
    <script src="/Public/home/layer_mobile/layer.js"></script>

    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>
<iframe name="niu-frame" style="display: none"></iframe>
    <link rel="stylesheet" href="/public/home/css/wallet.css">
<body>
<div id="header">
    <a href="#" onclick="back();return false;">
        <img class="back" src="/public/home/images/left.png">
    </a>
    账单详情
</div>
<div class="billBanner">
    <span class="company"><img src="/public/home/images/logo.png">江苏兔尔宝文化发展有限公司</span>
</div>
<div class="billMoney">
    <p class="value"><?php echo ($flow["money"]); ?></p>
    <p class="type">交易成功</p>
</div>
<div class="billMessage">
    <ul>
        <li><span class="title">付款方式</span><span class="intro"><?php echo ($type); ?></span></li>
        <li><span class="title">账单说明</span><span class="intro"><?php echo ($flow["remarks"]); ?></span></li>
        <li><span class="title">积分奖励</span><span class="intro"><?php echo ($flow["integral"]); ?>积分</span></li>
        <li><span class="title">创建时间</span><span class="intro"><?php echo (date("Y-m-d",$flow["create_time"])); ?></span></li>
    </ul>
</div>
</body>