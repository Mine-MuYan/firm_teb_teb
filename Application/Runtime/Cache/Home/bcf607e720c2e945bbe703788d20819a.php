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
    <a href="javascript:;" onclick="back()">
        <img class="back" src="/public/home/images/left.png">
    </a>
    注册币充值
</div>
<form class="recharge" action="<?php echo U('home/wallet/transfer');?>" method="post" target="niu-frame">
    <div class="form-input">
        <span class="target_account">充值金额</span>
        <input class="need-pay" name="need-pay" placeholder="请输入充值金额">
    </div>
    <div class="form-label">
        <label><img src="/Public/home/images/integral.png"><span>余额支付&nbsp;</span><input name="code" type="radio" value="1" checked ></label>
    </div>
    <button class="confirm rechargeSubmit" type="button">确认充值</button>
</form>
</body>
<script>
    $(".rechargeSubmit").click(function () {
        $.ajax({
            url:"<?php echo U('home/wallet/recharge');?>",
            type:"post",
            dataType:"json",
            data:{"money":$("input[name='need-pay']").val(),"code":$("input[name='code']").val()},
            success:function (data) {
                if (data){
                    layer.open({
                        content:data
                        ,btn: '我知道了'
                        ,yes:function(){
                            function _url(){
                                window.location.href = '<?php echo U("home/wallet/index");?>';
                            }
                            setTimeout(_url,100);
                        }
                    })
                }
            }
        });
//        layer.open({
//            title: [
//                '支付密码',
//                'background-color: #FF4351; color:#fff;'
//            ]
//            ,content:'<div class="pwd-box">' +
//            '<input type="tel" maxlength="6" class="pwd-input pay-input" checked>' +
//                 '<div class="fake-box">' +
//                '<input type="password" readonly="">'+
//                '<input type="password" readonly="">'+
//                '<input type="password" readonly="">'+
//                '<input type="password" readonly="">'+
//                '<input type="password" readonly="">'+
//                '<input id="last" type="password" readonly="">'+
//                '</div>'+
//                '</div>',
//            success:function (layero, index) {
//                var $input = $(".fake-box input");
//                $(".pay-input").on("keyup", function() {
//                    var pwd = $(this).val().trim();
//                    for (var i = 0, len = pwd.length; i < len; i++) {
//                        $input.eq("" + i + "").val(pwd[i]);
//                    }
//                    $input.each(function() {
//                        var index = $(this).index();
//                        if (index >= len) {
//                            $(this).val("");
//                        }
//                    });
//                    if (len == 6) {
//                        $.ajax({
//                            url:"<?php echo U('home/wallet/recharge');?>",
//                            type:"post",
//                            dataType:"json",
//                            data:{"pwd":$(".pay-input").val(),"money":$("input[name='need-pay']").val(),"code":$("input[name='code']").val()},
//                            success:function (data) {
//                                if (data){
//                                    layer.open({
//                                        content:data
//                                        ,btn: '我知道了'
//                                    })
//                                }
//                            }
//                        })
//                    }
//                });
//            }
//        });

    })
</script>