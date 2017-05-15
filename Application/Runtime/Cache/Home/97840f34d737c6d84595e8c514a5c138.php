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
<link rel="stylesheet" href="/Public/home/css/rank.css">
</head>
<body>
<div class="header">
    <span class="header-title">级别</span>
    <a href="#" onclick="javascript :history.back(-1);return false;"><span><img src="/public/home/images/1_02.png"/></span></a>
</div>
<div class="middle">
    <div class="middle-img"><img src="/public/home/images/1_10.png"></div>
    <div class="middle-msg">
        <p class="rank">级别：<?php echo ($my_rank["rank_name"]); ?></p>
        <p class="user-id" style="display: none"><?php echo ($my_rank["user_id"]); ?></p>
        <p class="user-cost" style="display: none"><?php echo ($my_rank["cost"]); ?></p>
        <p class="remark">级别越高,福利越多</p>
    </div>
</div>
<div class="foot">
    <div class="foot-rank">
        <div class="rank-left"><span>一级</span></div>
        <div class="rank-middle">
            <p class="rank">一级加盟商</p>
            <p class="remark"><span>加盟费<?php echo ($rank_message[0]['need_money']); ?>元</span></p>
        </div>
        <div class="rank-right"><button class="button-cs" data-id="1">升级</button></div>
        <!--<?php if($my_rank["id"] == 1): ?>-->
            <!--<div class="rank-right"><button class="button-cs">升级</button></div>-->
        <!--<?php else: ?>-->
            <!--<div class="rank-right"><button class="button-sub" data-id="1">升级</button></div>-->
        <!--<?php endif; ?>-->
    </div>
    <div class="foot-rank">
        <div class="rank-left cg-sub"><span>二级</span></div>
        <div class="rank-middle">
            <p class="rank">二级加盟商</p>
            <p class="remark"><span>加盟费<?php echo ($rank_message[1]['need_money']); ?>元</span></p>
        </div>
        <?php if($my_rank["id"] <= 2): ?><div class="rank-right"><button class="button-cs">升级</button></div>
            <?php else: ?>
            <div class="rank-right"><button class="button-sub" data-id="2">升级</button></div><?php endif; ?>
    </div>
    <div class="foot-rank">
        <div class="rank-left cg-main"><span>三级</span></div>
        <div class="rank-middle">
            <p class="rank">三级加盟商</p>
            <p class="remark"><span>加盟费<?php echo ($rank_message[2]['need_money']); ?>元</span></p>
        </div>
        <?php if($my_rank["id"] <= 3): ?><div class="rank-right"><button class="button-cs">升级</button></div>
            <?php else: ?>
            <div class="rank-right"><button class="button-sub" data-id="3">升级</button></div><?php endif; ?>
    </div>
</div>
</body>
<script>
    $('.button-sub').on('click',function(){
        var user_id = $('.user-id').html();
        var cost = $('.user-cost').html();
        var rank_id = $(this).attr('data-id');
        $.ajax({
            url:"<?php echo U('home/index/rankAjax');?>",
            type: 'post',
            dataType:'json',
            data:{user_id:user_id,rank_id:rank_id,cost:cost},
            success:function(data){
                if(data['code'] == 1){
                    layer.open({
                        content: '升级成功！'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    setTimeout('window.location.reload()',1000);
                }
                if(data['code'] == 3){
                    layer.open({
                        content: '注册币余额不足，请先充值！'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                }
            },
            error:function(){
                layer.open({
                    content: '网络系统出错，请重新操作！'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
            }
        });
    });
</script>
</html>