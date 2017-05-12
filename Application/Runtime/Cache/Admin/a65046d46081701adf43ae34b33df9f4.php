<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <link rel="stylesheet" href="/public/admin/css/pintuer.css">
    <link rel="stylesheet" href="/public/admin/css/homepage.css">
    <link rel="stylesheet" href="/public/admin/css/admin.css">
    <script src="/public/admin/js/jquery.js"></script>
    <script src="/public/admin/js/pintuer.js"></script>
    <script src="/public/admin/js/respond.js"></script>
    <script src="/public/admin/js/admin.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon"/>
    <link href="/favicon.ico" rel="bookmark icon"/>

</head>

<body>
<div class="xm4 padding" style="height: 100%">
    <div class="panel border" style="height: 30%;">
        <div class="panel-body text-center" style="height:80%;">
            <img src="/public/admin/images/login.png"><br>
        </div>
        <div class="panel-foot bg-back border-back text-center" style="height:20%;"><strong class="text-big">尚惠生活，帮助您成就梦想的舞台。</strong></div>
    </div>
    <br style="height: 2%">
    <div class="panel" style="height: 30%;">
        <div class="panel-head"><strong>管理员信息</strong></div>
        <ul class="list-group">
            <li><span class="float-right badge bg-min"><?php echo ($admin["name"]); ?></span><span class="icon-user"></span> 姓名</li>
            <li><span class="float-right badge bg-min"><?php echo ($admin["role"]); ?></span><span class="icon-tag"></span> 身份
            </li>
            <li><span class="float-right badge bg-min"><?php echo ($admin["mobile"]); ?></span><span class="icon-phone-square"></span> 手机号
            </li>
            <li><span class="float-right badge bg-min"><?php echo (date("Y-m-d H:i:s",$admin["mobile"])); ?></span><span class="icon-calendar"></span>上次登录时间
            </li>
        </ul>
    </div>
    <br style="height: 2%">
    <div class="panel" style="height: 34%;">
        <div class="panel-head"><strong>游戏信息统计</strong></div>
        <ul class="list-group">
            <li><span class="float-right badge bg-min"></span><span class="icon-user"></span>游戏总注册数</li>
            <li><span class="float-right badge bg-blue"></span><span class="icon-tag"></span>游戏总会员数</li>
            <li><span class="float-right badge bg-blue"></span><span class="icon-phone-square"></span>游戏总充值金额</li>
            <li><span class="float-right badge bg-blue"></span><span class="icon-calendar"></span>游戏总奖励金额</li>
        </ul>
    </div>
</div>
<div class="xm4 padding" style="height: 100%;">
    <div class="panel" style="height: 48%">
        <div class="panel-head"><strong>加盟商统计:</strong></div>
        <ul class="list-group">
            <li>
                <a href="javascript:;"><span class="float-right badge bg-blue"><?php echo ($htmlData["monthUser"]); ?></span></a>
                <span class="icon-database"></span>今日新增加盟商
            </li>
            <li>
                <a href="javascript:;"><span class="float-right badge bg-blue"><?php echo ($htmlData["allUser"]); ?></span></a>
                <span class="icon-database"></span> 所有正式加盟商
            </li>
            <li>
                <a href="javascript:;"><span class="float-right badge bg-blue"><?php echo ($htmlData["waitUser"]); ?></span></a>
                <span class="icon-database"></span>已冻结加盟商
            </li>
            <li>
                <a href="javascript:;"><span class="float-right badge bg-blue"><?php echo ($htmlData["waitUser"]); ?></span></a>
                <span class="icon-database"></span>已退费加盟商
            </li>
        </ul>
    </div>
    <br style="height: 2%">
    <div class="panel" style="height: 48%">
        <div class="panel-head"><strong>资金统计</strong></div>
        <ul class="list-group">
            <li>
                <span class="float-right badge bg-blue"><?php echo ($htmlData["allMoney"]); ?>元</span>
                <span class="icon-circle"></span>系统总收入
            </li>
            <li>
                <span class="float-right badge bg-blue"><?php echo ($htmlData["pay_money"]); ?>元</span>
                <span class="icon-circle"></span>总拨出金额
            </li>
            <li>
                <span class="float-right badge bg-blue"><?php echo ($htmlData["today_pay"]); ?>元</span>
                <span class="icon-circle"></span>今日拨出金额
            </li>
            <li>
                <span class="float-right badge bg-blue"><?php echo ($htmlData["not_pay"]); ?>元</span>
                <span class="icon-circle"></span>待拨出金额
            </li>
            <li>
                <span class="float-right badge bg-blue"><?php echo ($htmlData["dividend"]); ?></span>
                <span class="icon-circle"></span>项目分红点总数
            </li>
            <li>
                <span class="float-right badge bg-blue"><?php echo ($htmlData["cash_money"]); ?>元</span>
                <span class="icon-circle"></span>加盟商提现金额
            </li>
        </ul>
    </div>
</div>
<div class="xm4 padding" style="height: 100%;">
    <div class="panel" style="height: 98%">
        <div class="panel-head" >
            <strong><h4>加盟商排行榜</h4></strong>

        </div>
        <div class="panel-body tab" style="padding:0;">
            <div class="tab-head">
                <ul class="tab-nav">
                    <li class="active"><a href="#tab-1">积分排行榜</a></li>
                    <li><a href="#tab-2">业绩排排行榜</a></li>
                </ul>
            </div>
            <div class="tab-body">
                <div class="tab-panel active" id="tab-1">
                    <div class="panel" style="height: 100%;overflow-y: scroll;">
                        <table class="table ranking ">
                            <tr>
                                <th>排名</th>
                                <th>姓名</th>
                                <th>联系方式</th>
                                <th>奖励金额</th>
                            </tr>
                            <?php if(is_array($dailiRanking)): $k = 0; $__LIST__ = $dailiRanking;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
                                    <td><?php echo ($k); ?></td>
                                    <td><?php echo ($vo["real_name"]); ?></td>
                                    <td><?php echo ($vo["tel"]); ?></td>
                                    <td><?php echo ($vo["income"]); ?></td>
                                </tr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                        </table>
                    </div>
                </div>
                <div class="tab-panel" id="tab-2">
                    <div class="panel" style="height: 30rem;overflow-y: scroll;">
                        <table class="table ranking ">
                            <tr>
                                <th>姓名</th>
                                <th>联系方式</th>
                                <th>业务指标</th>
                                <th>完成量</th>
                            </tr>
                            <?php if(is_array($yewuRanking)): $k = 0; $__LIST__ = $yewuRanking;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
                                    <td><?php echo ($k); ?></td>
                                    <td><?php echo ($vo["real_name"]); ?></td>
                                    <td><?php echo ($vo["tel"]); ?></td>
                                    <td><?php echo ($vo["income"]); ?></td>
                                </tr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>