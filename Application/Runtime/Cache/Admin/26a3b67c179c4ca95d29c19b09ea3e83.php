<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>尚惠生活代理-后台管理</title>
    <link rel="stylesheet" href="/public/admin/css/pintuer.css">
    <link rel="stylesheet" href="/public/admin/css/admin.css">
    <link rel="stylesheet" href="/public/time/need/laydate.css">

    <script src="/public/admin/js/jquery.js"></script>
    <script src="/public/admin/js/pintuer.js"></script>
    <script src="/public/admin/js/respond.js"></script>
    <script src="/public/admin/js/admin.js"></script>
    <script src="/public/admin/js/functions.js"></script>
    <script src="/public/admin/js/echarts.js"></script>
    <script src="/public/time/laydate.js"></script>
    <script src="/Public/admin/layer/layer.js"></script>

    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />

    <base target="iframe"/>
</head>
<br>
<div class="container">
    <div class="panel">
        <div class="panel-head">加盟商列表</div>
        <div class="panel-body">
            <div class="table-responsive-y">
                <!--<form method="post" class="form-inline">-->
                    <!--<div class="form-group">-->
                        <!--<div class="label">-->
                            <!--<label for="user_name">加盟商</label>-->
                        <!--</div>-->
                        <!--<div class="field">-->
                            <!--<input type="text" class="input" id="user_name" name="user_name" size="20" placeholder="加盟商账号" />-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="form-group">-->
                        <!--<div class="label">-->
                            <!--<label for="province">省份</label>-->
                        <!--</div>-->
                        <!--<div class="field">-->
                            <!--<input type="text" class="input" id="province" name="province_id" size="20" placeholder="所属省份" />-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="form-group">-->
                        <!--<div class="label">-->
                            <!--<label for="city">城市</label>-->
                        <!--</div>-->
                        <!--<div class="field">-->
                            <!--<input type="text" class="input" id="city" name="city_id" size="20" placeholder="所属城市" />-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="form-button">-->
                        <!--<button class="button bg-main" type="submit">搜索</button>-->
                    <!--</div>-->
                <!--</form><br/>-->
                <table class="table table-bordered" style="text-align: center">
                    <tr>
                        <th style="text-align: center">编号</th>
                        <th style="text-align: center">加盟商</th>
                        <th style="text-align: center">等级</th>
                        <th style="text-align: center">所属省</th>
                        <th style="text-align: center">所属市</th>
                        <th style="text-align: center">个人业绩</th>
                        <th style="text-align: center">直推人数</th>
                        <th style="text-align: center">操作</th>
                    </tr>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($vo["id"]); ?></td>
                            <td><?php echo ($vo["user_name"]); ?></td>
                            <td><?php echo ($vo["rank"]); ?></td>
                            <td><?php echo ($vo["province"]); ?></td>
                            <td><?php echo ($vo["city"]); ?></td>
                            <td><?php echo ($vo["achievement"]); ?></td>
                            <td><?php echo ($vo["referee_num"]); ?></td>
                            <td>
                                <button id="recover" class="button bg-main button-small" msg_id="<?php echo ($vo["id"]); ?>">恢复</button>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>
            <div class="pages"><?php echo ($page); ?></div>
        </div>
    </div>
</div>
<script>
    $('#recover').on('click',function(){
        var id = $(this).attr('msg_id');
        $.post("<?php echo U('admin/joining/botherList');?>",{status:1,id:id},function(data){
            if(data['code'] == 1){
                layer.msg('回复成功',{icon:1});
                setTimeout("window.location.reload()", 1500);
            }
        })
    })
</script>