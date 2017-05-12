<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <title>设置</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width,user-scalable=no,initial-scale=1">
    <link rel="stylesheet" href="/public/home/css/common.css">
    <link rel="stylesheet" href="/public/home/css/News.css">
    <script src="/Public/home/js/common.js"></script>
    <script src="/Public/home/js/jquery.js"></script>
    <script src="/Public/home/layer_mobile/layer.js"></script>
</head>
<body>
<div class="header">
    <span class="header-title">系统通知</span>
    <a href="<?php echo U('home/information/index');?>"><span><img src="/public/home/images/1_02.png"/></span></a>
</div>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="news-list">
        <div class="list-title">江苏兔尔宝文化发展有限公司</div>
        <div class="list-type">类型：系统通知</div>
        <div class="list-time">发布时间：<?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?><span class="read-message" data-id="<?php echo ($vo["id"]); ?>">查看详情</span></div>
    </div>
    <div class="info-dialogs">
        <div class="message-title title<?php echo ($vo["id"]); ?>" style="text-align: center;"><?php echo ($vo["title"]); ?></div>
        <div class="message-content content<?php echo ($vo["id"]); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo["content"]); ?></div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
<script>
    $('.read-message').on('click',function(){
        var id = $(this).attr('data-id');
        layer.open({
            title:$('.title'+id).html(),
            content: $('.content'+id).html(),
            btn: '我知道了'
        });
    });
</script>
</html>