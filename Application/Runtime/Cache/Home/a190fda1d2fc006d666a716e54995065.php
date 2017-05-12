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
<link rel="stylesheet" href="/Public/home/css/wallet.css">
</head>
<body>
<div id="header">
    <a href="<?php echo U('home/'.$url.'/index');?>">
        <img class="back" src="/public/home/images/left.png">
    </a>
    钱包
</div>
<div class="banner">
    <div class="img-bg">
        <img src="/public/home/images/ceshi.png">
    </div>
    <p><?php echo ($user["real_name"]); ?></p>
</div>
<div class="moneySum">
    <div class="money">
        <p class="value"><?php echo ($user["money"]); ?></p>
        <p class="name">余额</p>
    </div>
    <div class="coin">
        <p class="value"><?php echo ($user["register_coin"]); ?></p>
        <p class="name">注册币</p>
    </div>
    <div class="integral">
        <p class="value"><?php echo ($user["points"]); ?></p>
        <p class="name">积分</p>
    </div>
</div>
<div class="detailed">
    <div class="title">
       <p> 资产明细</p>
    </div>
    <ul class="content">
        <a href="<?php echo U('/home/wallet/moneyDetail');?>">
            <li class="money">
                <img class="icon" src="/public/home/images/money.png">
                <span>余额</span>
                <img class="right" src="/public/home/images/right.png">
            </li>
        </a>
        <a href="<?php echo U('/home/wallet/pointsDetail');?>">
            <li class="integral">
                <img class="icon" src="/public/home/images/integral.png">
                <span>积分</span>
                <img class="right" src="/public/home/images/right.png">
            </li>
        </a>
        <li class="integral" style="border-top: 1px solid #cccccc">
            <img class="icon" src="/public/home/images/money.png">
            <span>游戏余额</span>
            <span style="float: right;margin-right: 0.15rem"><?php echo ($user["fixed_recharge"]); ?></span>
        </li>
    </ul>
</div>

<div class="detailed2">
    <ul class="content">
        <!--<a href="javascript:;" onclick="mobileBoxMsg('暂未开放充值功能，敬请期待！')">-->
        <a href="<?php echo U('home/wallet/recharge');?>">
            <li class="money">
                <img class="icon" src="/Public/home/images/recharge.png">
                <span>注册币充值</span>
                <img class="right" src="/public/home/images/right.png">
            </li>
        </a>
        <?php if($bankUrl == 1): ?><a href="<?php echo U('/home/wallet/bindingBank');?>">
                <li class="integral">
                    <img class="icon" src="/Public/home/images/bank.png">
                    <span>绑定银行卡</span>
                    <img class="right" src="/public/home/images/right.png">
                </li>
            </a>
            <?php else: ?>
            <a href="<?php echo U('/home/wallet/myBank');?>">
                <li class="integral">
                    <img class="icon" src="/Public/home/images/bank.png">
                    <span>绑定银行卡</span>
                    <img class="right" src="/public/home/images/right.png">
                </li>
            </a><?php endif; ?>
    </ul>
</div>
<div class="foot-seize"></div>
<div class="foot">
    <?php if($code == 1): ?><a class="cash" href="<?php echo U('home/wallet/cash');?>">提现</a>
        <!--<a class="cash weihu">提现</a>-->
        <?php else: ?>
        <a class="cash notCash">提现</a><?php endif; ?>
    <a class="transfer" href="<?php echo U('home/wallet/transfer');?>">转账</a>
    <!--<a class="transfer weihu">转账</a>-->
</div>
</body>
<script>
    $(function () {
        $(".notCash").click(function () {
            layer.open({
                content: '未到可提现时间！<br>可提现时间为每周三10:00-22:00。'
                ,btn: '我知道了'
            })
        })
        $(".weihu").click(function () {
            layer.open({
                content: '功能维护中，请耐心等待！'
                ,btn: '我知道了'
            })
        })
    });
</script>