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
<link rel="stylesheet" href="/public/home/css/support.css">
<script src="/Public/home/js/support.js"></script>
<body>
<div class="header"><strong>支持</strong></div>
<div class="panels-head">必备工具</div>
<div class="panels-body">
    <ul>
        <a href="<?php echo U('home/index/rank',array('rank_id'=>$rank_id));?>"><li>
            <p class="img-title"><img src="/Public/home/images/3_05.png"/> </p>
            <p class="word-title">升级</p>
        </li></a>
        <?php if($userMsg['is_service'] == 1 AND $userMsg['id'] != 2 AND $userMsg['id'] != 3): if($code == 1): ?><a href="<?php echo U('home/support/register');?>"><li>
                <p class="img-title"><img src="/Public/home/images/3_07.png"/> </p>
                <p class="word-title">加盟商注册</p>
            </li></a>
                <?php else: ?>
                <a href="javascript:;" class="fail-register"><li>
                    <p class="img-title"><img src="/Public/home/images/3_07.png"/> </p>
                    <p class="word-title">加盟商注册</p>
                </li></a><?php endif; ?>
            <?php else: ?>
            <a href="javascript:;" class="notRegister"><li>
                <p class="img-title"><img src="/Public/home/images/3_07.png"/> </p>
                <p class="word-title">加盟商注册</p>
            </li></a><?php endif; ?>
        <a href="javascript:;" class="setCenter" service="<?php echo ($userMsg); ?>" status="<?php echo ($exchangeMsg['status']); ?>" val="<?php echo ($exchangeMsg['id']); ?>"  achievement="<?php echo ($achievement); ?>"><li>
            <p class="img-title"><img src="/Public/home/images/3_03.png"/> </p>
            <p class="word-title">成为中心</p>
        </li></a>
        <a href="<?php echo U('home/wallet/index?code=2');?>"><li class="diff-li">
            <p class="img-title"><img src="/Public/home/images/3_09.png"/> </p>
            <p class="word-title">财务中心</p>
        </li></a>
    </ul>
    <ul>
        <a href="<?php echo U('home/support/income');?>"><li>
            <p class="img-title"><img src="/Public/home/images/3_15.png"/> </p>
            <p class="word-title">收入管理</p>
        </li></a>
        <a href="javascript:;" onclick="mobileBoxMsg('暂未开放发布活动功能，敬请期待！')"><li>
            <p class="img-title"><img src="/Public/home/images/3_16.png"/> </p>
            <p class="word-title">发布活动</p>
        </li></a>
        <a href="javascript:;" onclick="mobileBoxMsg('暂未开放物料领取功能，敬请期待！')"><li>
            <p class="img-title"><img src="/Public/home/images/3_17.png"/> </p>
            <p class="word-title">物料领取</p>
        </li></a>
        <a href="tel:400-3603-3352"><li class="diff-li">
            <p class="img-title"><img src="/Public/home/images/3_18.png"/> </p>
            <p class="word-title">客服中心</p>
        </li></a>
    </ul>
</div>
<div class="panels-head">辅助工具</div>
<div class="panels-body">
    <ul>
        <a href="<?php echo U('home/support/myTeam');?>"><li>
            <p class="img-title"><img src="/Public/home/images/3_23.png"/> </p>
            <p class="word-title">合作伙伴</p>
        </li></a>
        <a href="javascript:;" onclick="mobileBoxMsg('暂未开放附近中心功能，敬请期待！')"><li>
            <p class="img-title"><img src="/Public/home/images/3_24.png"/> </p>
            <p class="word-title">附近中心</p>
        </li></a>
        <a href="javascript:;" onclick="mobileBoxMsg('暂未开放体验中心功能，敬请期待！')"><li>
            <p class="img-title"><img src="/Public/home/images/3_25.png"/> </p>
            <p class="word-title">体验中心</p>
        </li></a>
        <a href="javascript:;" onclick="mobileBoxMsg('暂未开放课堂功能，敬请期待！')"><li class="diff-li">
            <p class="img-title"><img src="/Public/home/images/3_26.png"/> </p>
            <p class="word-title">课堂</p>
        </li></a>
    </ul>
</div>
<div class="foot-size"></div>
<div class="foot">
    <a href="<?php echo U('home/index/index');?>"><div class="foot-left">
        <p><img src="/Public/home/images/1_31.png"></p>
        <p>我的</p>
    </div></a>
    <a href="<?php echo U('home/RabbitBao/index');?>"><div class="foot-center">
        <span class="span_top"></span>
        <span class="span_bottom"><span>兔尔宝</span></span>
    </div></a>
    <a href="<?php echo U('home/support/index');?>"><div class="foot-right">
        <p><img src="/Public/home/images/1_34.png"></p>
        <p>支持</p>
    </div></a>
</div>
</body>
</html>
<script>
    $(".notRegister").click(function () {
        console.log(1);
        layer.open({
            content:"体验中心才可使用此功能，请将注册人信息发送给你所属的体验中心注册！",
            skin:"msg",
            time:3
        })
    });
    $(".fail-register").click(function () {
        console.log(1);
        layer.open({
            content: '今日加盟商注册人数已满，请每日于12:00:00后抓紧时间注册！'
            ,btn: '我知道了'
        })
    });
    $(".setCenter").click(function () {
        var status = $(this).attr("status");
        var service = $(this).attr("service");
        var achievement = $(this).attr("achievement");
        if (service == 1){
            layer.open({
                content: '您已经成立体验中心，请勿重复申请。'
                ,skin: 'msg'
                ,time: 2 //2秒后自动关闭
            });
        }else{
            if (achievement < 300000){
                layer.open({
                    content: '您的业绩未达标，不能成立体验中心。'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
            }else{
                if (status == ""){
                    location.href = "<?php echo U('home/support/applyExchange');?>"
                }else if(status == 1){
                    layer.open({
                        content: '您已申请成立体验中心，请等待公司审核！'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                }else if(status == 2){
                    layer.open({
                        content: '您已成功申请成立体验中心！'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                }else if(status == 3){
                    layer.open({
                        content: '您的申请已被驳回，是否重新提交申请？'
                        ,btn: ['确定', '取消']
                        ,yes: function(){
                            $.ajax({
                                type:"post",
                                url:"<?php echo U('home/support/reapply');?>",
                                dataType:"json",
                                success:function (data) {
                                    if (data){
                                        location.reload();
                                    }else{
                                        layer.open({
                                            context:"申请提交失败！"
                                            ,skin: 'msg'
                                            ,time: 2 //2秒后自动关闭
                                        })
                                    }
                                }
                            })
                        }
                    });
                }
            }
        }
    });
</script>