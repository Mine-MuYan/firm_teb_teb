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
<script src="/Public/home/js/wallet.js"></script>
<body>
<div id="header">
    <a href="javascript:;" class="goBank">
        <img class="back" src="/public/home/images/left.png">
    </a>
    注册币转账
</div>
<form class="transfer" action="<?php echo U('home/wallet/transfer');?>" method="post" target="niu-frame">
    <div class="first-page">
        <div class="form-input" >
            <span class="target_account">转账对象</span>
            <input class="target_mobile" name="rec_mobile" placeholder="转账对象手机号码">
        </div>
        <p class="notes">转入对方账户的金额无法退款</p>
        <button class="transfer-next" type="button">下一步</button>
    </div>

    <div class="last-page">
        <div class="confirm_account">
            <div class="account">
                <div class="name">转账对象：</div>
                <div class="value"></div>
            </div>
            <div class="mobile">
                <div class="name">手机号码：</div>
                <div class="value"></div>
            </div>
        </div>
        <div class="form-input">
            <span class="target_account">转账金额</span>
            <input class="target_mobile" name="need_pay" placeholder="请输入转账金额">
        </div>
        <button class="confirm" type="submit">确认转账</button>
    </div>
</form>
</body>
</html>
<script>
    $(".transfer-next").click(function () {
        var mobile = $(".target_mobile").val();
        if (mobile == ""){
            layer.open({
                content: '请输入转账对象！'
                ,skin: 'msg'
                ,time: 2 //2秒后自动关闭
            });
        }else{
            console.log(mobile);
            $.ajax({
                type:"post",
                url:"<?php echo U('home/wallet/queryUser');?>",
                data:{"mobile":mobile},
                dataType:"json",
                success:function (data) {
                    console.log(data);
                    if (data == null){
                        layer.open({
                            content: '该用户不存在！'
                            ,skin: 'msg'
                            ,time: 2 //2秒后自动关闭
                        });
                    }else {
                        $(".first-page").hide();
                        $(".last-page").show();
                        $('.account .value').html(data['real_name']);
                        $('.mobile .value').html(data['user_name']);
                    }
                }
            })
        }
    })
</script>