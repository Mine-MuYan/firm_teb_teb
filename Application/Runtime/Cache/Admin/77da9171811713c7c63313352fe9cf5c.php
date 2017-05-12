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
<script language="javascript" type="text/javascript" src="/Public/static/My97DatePicker/WdatePicker.js"></script>
<div class="container">
    <div class="panel">
        <div class="panel-head">业绩查询-中心</div>
        <div class="panel-body">
            <div class="table-responsive-y">
                <form action="<?php echo U('admin/joining/forSeakCenter');?>" method="POST" id="form">
                    <div class="text-right">
                        <span>默认显示的是所有中心的业绩列表，点击选择要查询的起、止时间：</span>
                        <input type="text" onClick="WdatePicker()" name="dt1" style="cursor: pointer;" placeholder="点击开始选择时间" value="<?php echo (date('Y-m-d',$start)); ?>"> -
                        <input type="text" onClick="WdatePicker()" name="dt2" style="cursor: pointer;" placeholder="点击结束选择时间" value="<?php echo (date('Y-m-d',$end)); ?>">
                        <button class="button bg-sub add-agent" type="submit" target-form="form-horizontal">确 定</button>
                    </div>
                    <br>
                    <table class="table table-bordered" style="text-align: center">
                        <thead>
                            <tr>
                                <!--<th style="text-align: center">序号</th>-->
                                <th style="text-align: center">用户ID</th>
                                <th style="text-align: center">用户姓名</th>
                                <th style="text-align: center">推荐人姓名</th>
                                <th style="text-align: center">中心等级</th>
                                <th style="text-align: center">伞下业绩</th>
                                <th style="text-align: center">成为中心后的业绩</th>
                                <th style="text-align: center">注册时间</th>
                                <th style="text-align: center">成为中心时间</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                            <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <!--<td><?php echo ($vo["uid"]); ?> </td>-->
                                    <td><?php echo ($vo["id"]); ?> </td>
                                    <td><?php echo ($vo["real_name"]); ?> </td>
                                    <td>
                                    <?php if($vo["referee_id"] == null): ?>没有邀请人
                                        <?php else: ?> <?php echo ($vo["username"]); endif; ?>
                                    </td>
                                    <td>
                                        <?php if($vo["rank_id"] == 1): ?>一级
                                            <?php elseif($vo["rank_id"] == 2): ?> 二级
                                            <?php elseif($vo["rank_id"] == 3): ?> 三级
                                        <?php else: ?> 四级<?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($vo["user_sum"] == null): ?>无记录
                                            <?php else: ?> <a href="<?php echo U('admin/joining/forSeakDetail',array('id'=>$vo['id']));?>" style="color:green;" title="点击查看具体记录"> <?php echo (number_format($vo["user_sum"],2)); ?> </a><?php endif; ?>
                                    </td>
                                    <td><?php echo (number_format($vo["achievement"],2)); ?> </td>
                                    <td><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?> </td>
                                    <td><?php echo (date('Y-m-d H:i:s',$vo["handle"])); ?> </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="pages"><?php echo ($_page); ?></div>
        </div>
    </div>
</div>