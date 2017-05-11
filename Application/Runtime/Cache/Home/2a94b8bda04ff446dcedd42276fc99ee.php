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
<link rel="stylesheet" href="/Public/home/css/index.css">
<body>
    <div class="header"><strong>我的</strong></div>
    <div class="header-person">
        <div class="person-img"><img src="/Public/home/images/1_05.png"></div>
        <div class="person-name">
            <p class="user-name"><?php echo ($user_message["real_name"]); ?>
                <?php if($user_message['is_service'] == 1): if($user_message['rank_id'] == 1): ?><span style="background: red;">市体验中心</span>
                        <?php else: ?>
                        <span style="background: green;">区体验网点</span><?php endif; endif; ?>
            </p>
            <!--<p class="user-id">ID：<?php echo ($user_message["id"]); ?></p>-->
        </div>
        <div class="person-info">
            <a href="<?php echo U('home/index/myInfo');?>">个人信息<img class="img-icon" src="/Public/home/images/1_06.png"></a>
        </div>
    </div>
    <div class="part-info">
        <div class="achievement-info">
            <?php if($user_message['id'] < 4 ): ?><a href="<?php echo U('home/index/myTeam');?>">
                    <p class="num"><?php echo ($allAchievement); ?></p>
                    <p class="name">业绩统计</p>
                </a>
                <?php else: ?>
                <?php if($user_message['is_service'] == 1): ?><a href="javascript:;">
                        <p class="num"><?php echo ($user_message["achievement"]); ?></p>
                        <p class="name">业绩统计</p>
                    </a>
                    <?php else: ?>
                    <a href="javascript:;" class="achievement">
                        <p class="num"><?php echo ($user_message["all_achievement"]); ?></p>
                        <p class="name">业绩统计</p>
                    </a><?php endif; endif; ?>
            <script>
                $(".achievement").click(function () {
                    var achievent = 300000 - $('.num').html();
                    if (achievent > 0){
                        layer.open({
                            content: '您距离体验中心还差' + achievent + '业绩',
                            btn: ['我知道了'],
                            yes:function () {
                                location.reload(true);
                            }
                        });
                    }
                })
            </script>
        </div>
        <!--<table class="line" cellpadding="0" cellspacing="0"></table>-->
        <hr class="line"/>
        <div class="partner-info">
            <a href="<?php echo U('home/support/myTeam');?>">
                <p class="num"><?php echo ($user_message["number"]); ?></p>
                <p class="name">合作伙伴</p>
            </a>
        </div>
        <hr class="line">
        <div class="play">
            <a href="javascript:;" onclick="mobileBoxMsg('游戏暂未开放，敬请期待')">
                <p class="num">0</p>
                <p class="name">玩家总数</p>
            </a>
        </div>
    </div>
    <div class="part-class">
        <div class="rank">
            <a href="<?php echo U('home/index/rank');?>">
                <img class="rank-img1" src="/Public/home/images/1_11.png">
                <span>
                    <p class="rank-name">级别：<?php echo ($user_message["rank_id"]); ?>级</p>
                    <p class="rank-remark">级别越高,福利越多</p>
                </span>
            </a>
        </div>
        <hr class="line"/>
        <div class="rank">
            <a href="<?php echo U('home/index/rankingList');?>">
                <img class="rank-img2" src="/Public/home/images/1_14.png">
                <span>
                    <p class="rank-name">排行：<?php echo ($user_message["ranking"]); ?></p>
                    <p class="rank-remarks">排行越高,荣誉越高</p>
                </span>
            </a>
        </div>
    </div>
    <div class="part-pay">
        <a href="<?php echo U('home/wallet/index?code=1');?>"><div class="nav-sort"><img src="/Public/home/images/1_19.png">钱包<img class="img-icon1" src="/Public/home/images/1_06.png"></div></a>
        <a href="<?php echo U('home/information/index');?>"><div class="nav-ad"><img src="/Public/home/images/1_22.png">消息中心<img class="img-icon1" src="/Public/home/images/1_06.png"></div></a>
    </div>
    <div class="activity">
        <a href="<?php echo U('home/task/taskList');?>"><div class="nav-sort"><img src="/Public/home/images/1_24.png">我的任务<img class="img-icon1" src="/Public/home/images/1_06.png"></div></a>
        <a href="#"><div class="nav-ad share"><img src="/Public/home/images/1_26.png">分享有奖<img class="img-icon1" src="/Public/home/images/1_06.png"></div></a>
    </div>
    <div class="set">
        <a href="<?php echo U('home/set/setList');?>"><div class="nav-ad"><img src="/Public/home/images/1_28.png">设置<img class="img-icon1" src="/Public/home/images/1_06.png"></div></a>
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
<script>
    $('.share').on('click', function () {
        //自定义标题风格
        layer.open({
            content: '<img src="/Public/home/images/2_103.png" style="width: 100%;height: 100%"/>',
            style: 'background-color:#fff; color:#fff; border:none;height:60%;width:80%;border-radius:10px;' //自定风格
        });

    });
</script>
</html>