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
        <div class="panel-head">提升加盟商等级</div>
        <div class="panel-body">
            <div class="table-responsive-y">
                <table class="table table-bordered" style="text-align: center">
                    <tr>
                        <th style="text-align: center">加盟商</th>
                        <th style="text-align: center">等级</th>
                        <th style="text-align: center">新等级</th>
                        <th style="text-align: center">缴费金额</th>
                        <th style="text-align: center">操作</th>
                    </tr>
                    <form method="post" class="form-x" action="<?php echo U('admin/joining/upGrade');?>">
                        <tr>
                            <td>
                                <input type="text" name="user_name" class="input input-auto input-small" size="20"
                                       value="<?php echo ($refer["user_name"]); ?>" data-validate="required:此项必填">
                            </td>
                            <td>
                                <input type="text" name="old_class" class="input input-auto input-small" size="20"
                                       value="<?php echo ($refer["old_class"]); ?>" data-validate="required:此项必填,number:只能填写数字">
                            </td>
                            <td>
                                <input type="text" name="new_class" class="input input-auto input-small" size="20"
                                       value="<?php echo ($refer["new_class"]); ?>" data-validate="required:此项必填,number:只能填写数字">
                            </td>
                            <td>
                                <input type="text" name="money" class="input input-auto input-small" size="20"
                                       value="<?php echo ($refer["money"]); ?>" data-validate="required:此项必填,number:只能填写数字">
                            </td>
                            <td>
                                <button class="button border-blue button-small" type="submit">确认修改</button>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div><br>
    <!--<div class="panel">-->
        <!--<div class="panel-head">加盟商升级记录</div>-->
        <!--<div class="panel-body">-->
            <!--<div class="table-responsive-y">-->
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
                <!--<table class="table table-bordered" style="text-align: center">-->
                    <!--<tr>-->
                        <!--<th style="text-align: center">编号</th>-->
                        <!--<th style="text-align: center">加盟商</th>-->
                        <!--<th style="text-align: center">新等级</th>-->
                        <!--<th style="text-align: center">升级时间</th>-->
                        <!--<th style="text-align: center">操作人ID</th>-->
                        <!--<th style="text-align: center">操作人员</th>-->
                    <!--</tr>-->
                <!--</table>-->
            <!--</div>-->
            <!--<div class="pages"><?php echo ($page); ?></div>-->
        <!--</div>-->
    <!--</div>-->
</div>