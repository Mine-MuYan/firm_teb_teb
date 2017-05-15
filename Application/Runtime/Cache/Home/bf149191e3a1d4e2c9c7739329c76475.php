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
    <script src="/public/home/js/wallet.js"></script>
</head>
<body>
<div id="header">
    <a href="javascript:;" onClick="back();return false;">
        <img class="back" src="/public/home/images/left.png">
    </a>
    余额明细
</div>
<div class="detailBanner">
    <div id="income" class="action">
        <p>收入</p>
    </div>
    <div id="expend">
        <p>支出</p>
    </div>
</div>
<div class="detailBody">
    <div class="expend hidden" style="display: none">
        <div class="selectTime">
            <p class="name">账单月份</p>
            <div class="time">
                <input class="choiceTime" state="expend" type="month" value="" />
            </div>
        </div>
        <div class="totalMoney">
            <p class="money">
                <?php echo ($expend["money"]); ?>
            </p>
            <p class="explain">
                本月支出
            </p>
        </div>
        <div class="news">
            本月支出<?php echo ($expend["count"]); ?>笔
        </div>
        <div class="specific">
            <ul>
                <?php if(is_array($expend["flow"])): $i = 0; $__LIST__ = $expend["flow"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('home/wallet/singleDetailed?type=1&flow_id='.$vo['id']);?>">
                        <li>
                            <div class="left">
                                <p class="explain"><?php echo ($vo["remarks"]); ?></p>
                                <p class="time"><?php echo (date("Y-m-d",$vo["create_time"])); ?></p>
                            </div>
                            <div class="right">
                                <p class="money"><?php echo ($vo["money"]); ?></p>
                                <img class="right" src="/public/home/images/right.png">
                            </div>
                        </li>
                    </a><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <div class="income hidden">
        <div class="selectTime">
            <p class="name">账单月份</p>
            <div class="time">
                <!--<img class="right" src="/public/home/images/right.png">-->
                <input class="choiceTime" state="income" type="month" value="" />
            </div>
        </div>
        <div class="totalMoney">
            <p class="money">
                +<?php echo ($income["money"]); ?>元
            </p>
            <p class="explain">
                本月收入
            </p>
        </div>
        <div class="news">
            本月收入<?php echo ($income["count"]); ?>笔
        </div>
        <div class="specific">
            <ul>
                <?php if(is_array($income["flow"])): $i = 0; $__LIST__ = $income["flow"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('home/wallet/singleDetailed?type=1&flow_id='.$vo['id']);?>">
                        <li>
                            <div class="left">
                                <p class="explain"><?php echo ($vo["remarks"]); ?></p>
                                <p class="time"><?php echo (date("Y-m-d",$vo["create_time"])); ?></p>
                            </div>
                            <div class="right">
                                <p class="money"><?php echo ($vo["money"]); ?></p>
                                <img class="right" src="/public/home/images/right.png">
                            </div>
                        </li>
                    </a><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>
<script>
    $(".choiceTime").change(function () {
        $.ajax({
            type:"post",
            url : "<?php echo U('home/wallet/moneyDetail');?>",
            data:{"time":$(this).val(),"state":$(this).attr("state")},
            dataType:"json",
            success:function (data) {
                if (data.type == "expend"){
                    $(".expend .specific ul").html("");
                    $(".expend .totalMoney .money").html(data.money);
                    $(".expend .totalMoney .news").html("本月支出" + data.count + "笔");
                    for(var i = 0;i < data.flow.flow.length;i++){
                        var url = "<?php echo U('home/wallet/singleDetailed/type/1/flow_id/" + data.flow.flow[i].id +"');?>";
                        $(".expend .specific ul").append(
                                "<a href='" + url + "'>" +
                                "<li>" +
                                "<div class='left'>" +
                                "<p class='explain'>" + data.flow.flow[i].remarks + "</p>" +
                                "<p class='time'>" + data.flow.flow[i].time + "</p>" +
                                "</div>" +
                                "<div class='right'>" +
                                "<p class='money'>" + data.flow.flow[i].money + "</p>" +
                                "<img class='right' src='/public/home/images/right.png'>" +
                                "</div>" +
                                "</li>" +
                                "</a>");
                    }
                }
                if (data.type == "income"){
                    $(".income .specific ul").html("");
                    $(".income .totalMoney .money").html("+" + data.money);
                    $(".income .totalMoney .news").html("本月收入" + data.count + "笔");
                    for(var i = 0;i < data.flow.flow.length;i++){
                        var url = "<?php echo U('home/wallet/singleDetailed/type/1/flow_id/" + data.flow.flow[i].id +"');?>";
                        $(".income .specific ul").append(
                                "<a href='" + url + "'>" +
                                "<li>" +
                                "<div class='left'>" +
                                "<p class='explain'>" + data.flow.flow[i].remarks + "</p>" +
                                "<p class='time'>" + data.flow.flow[i].time + "</p>" +
                                "</div>" +
                                "<div class='right'>" +
                                "<p class='money'>+" + data.flow.flow[i].money + "</p>" +
                                "<img class='right' src='/public/home/images/right.png'>" +
                                "</div>" +
                                "</li>" +
                                "</a>");
                    }
                }
            }
        })
    })
</script>
</body>