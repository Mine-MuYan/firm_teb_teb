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
    <script src="/Public/home/js/wallet.js"></script>
</head>
<body>
<div id="header">
    <a href="javascript:;" class="goBank">
        <img class="back" src="/public/home/images/left.png">
    </a>
    绑定银行卡
</div>
<form method="post" action="<?php echo U('home/wallet/bindingBank');?>" target="niu-frame">
<div class="input-card first-page">
    <p>请绑定本人银行卡</p>
    <div class="bank-card">
        <span>银行卡号：</span>
        <input class="" name="bank-card" type="text" placeholder="请输入银行卡号">
    </div>
    <div class="bank-card">
        <span>确认卡号：</span>
        <input class="bank-card2" name="bank-card2" type="text" placeholder="请确认银行卡号">
    </div>
    <button class="next" type="button">下一步</button>
</div>
<div class="input-massage last-page">
    <p>通过验证银行卡信息确保本人操作</p>
    <form></form>
    <div class="bank-card">
        <span>所属银行：</span>
        <input class="" name="bank-name" type="text" placeholder="请输入开户银行">
    </div>
    <ul class="bank-massage">
        <li>
            <span>持卡人：</span>
            <input class="" name="holder-name" type="text" placeholder="持卡人姓名">
        </li>
        <li>
            <span>证件号：</span>
            <input class="" name="card-id" type="text" placeholder="身份证号码">
        </li>
        <li>
            <span>手机号：</span>
            <input class="" name="mobile" type="text" placeholder="银行预留手机号">
        </li>
    </ul>
    <button class="" type="submit">提交</button>
</div>
</form>
</body>
<iframe name="niu-frame" style="display: none"></iframe>
</html>