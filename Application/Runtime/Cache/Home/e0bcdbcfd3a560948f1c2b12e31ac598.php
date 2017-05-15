<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>钱包</title>
    <link rel="stylesheet" href="/public/home/css/home.css">
    <link rel="stylesheet" href="/public/home/css/register.css">

    <script src="/public/admin/js/jquery.js"></script>
    <script src="/Public/home/layer/layer.js"></script>
    <script src="/Public/home/layer_mobile/layer.js"></script>
    <script src="/public/home/js/common.js"></script>
    <script src="/Public/home/js/register.js"></script>
</head>
<body>
<div id="header">
    <a href="#" onClick="javascript :history.back(-1);return false;">
        <img class="back" src="/public/home/images/left.png">
    </a>
    加盟商注册
</div>
<div class="form">
    <form class="" action="<?php echo U('home/support/register');?>" method="post" target="niu-frame">
        <div class="form-input real_name">
            <span>姓名：</span>
            <input name="real_name" type="text" placeholder="请输入真实姓名">
        </div>
        <div class="form-input mobile">
            <span>电话：</span>
            <input name="mobile" type="text" placeholder="请输入手机号码">
        </div>
        <div class="form-input card_id">
            <span>身份证号：</span>
            <input name="card_id" type="text" placeholder="请输入身份证号码">
        </div>
        <div class="form-input addr">
            <span>地址：</span>
            <select id="province" name="province" style="width:0.6rem;">
                <option selected="selected" value="">请选择省</option>
                <?php if(is_array($province)): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["code"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <select id="city" name="city" style="width:0.6rem;">
                <option selected='selected'  value=''>请选择市</option>
            </select>
            <select id="area" name="area" style="width:0.6rem;">
                <option selected="selected"  value="">请选择区</option>
            </select>
        </div>
        <div class="form-input address">
            <span>详细地址：</span>
            <input name="address" type="text" placeholder="请输入详细地址">
        </div>
        <div class="form-input rank">
            <span>加盟商级别：</span>
            <select name="rank" >
                <option selected="selected" value="0">请选择加盟商级别</option>
                <?php if(is_array($ranks)): $i = 0; $__LIST__ = $ranks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["rank_name"]); ?>(￥<?php echo ($vo["need_money"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
        <div class="form-input referee">
            <span>推荐人：</span>
            <input name="referee" type="text" placeholder="请输入推荐人手机号码">
            <input type="hidden" name="referee_id">
        </div>
        <div class="form-input referee">
            <span>注册币余额：</span>
            <input name="corn" type="text" value="<?php echo ($user_message["register_coin"]); ?>" readonly>
        </div>
        <div class="form-button">
            <!--<button class="button" type="submit" onclick="loadingBox('用户注册中，请稍后。。。')">提交</button>-->
            <button class="button" type="submit">提交</button>
        </div>
    </form>
</div>

<script>
    $("#province").change(function () {
        $("#city").html("<option selected='selected'  value=''>请选择市</option>");
        var provinceId = $(this).val();
        $.ajax({
            type:"post",
            url:"<?php echo U('home/support/getCity');?>",
            dataType:"json",
            data:{"provinceId":provinceId},
            success:function (data) {
                for (var i=0; i < data.length; i++){
                    $("#city").append("<option value='" + data[i].code + "'>" + data[i].name +"</option>")
                }
            }
        })
    });
    $("#city").change(function () {
        $("#area").html("<option selected='selected'  value=''>请选择区</option>");
        var cityId = $(this).val();
        $.ajax({
            type:"post",
            url:"<?php echo U('home/support/getArea');?>",
            dataType:"json",
            data:{"cityId":cityId},
            success:function (data) {
                for (var i=0; i < data.length; i++){
                    $("#area").append("<option value='" + data[i].code + "'>" + data[i].name +"</option>")
                }
            }
        })
    });
    $(".referee").keyup(function () {
        var referee = $("input[name='referee']").val();
        if (referee.length == 11){
            $.ajax({
                type:"post",
                url:"<?php echo U('home/support/getReferee');?>",
                data:{"referee":referee},
                dataType:"json",
                success:function (data) {
                    if (data == null){
                        layer.open({
                            content:"未找到推荐人信息",
                            skin:"msg",
                            time:2
                        })
                    }else{
                        $("input[name='referee_id']").val(data.id);
                        layer.open({
                            content: "推荐人姓名：" + data.real_name
                            ,btn: '我知道了'
                        });
                    }
                }
            })
        }
    })
</script>
</body>
<iframe name="niu-frame" style="display: none;color:#ffffff;"></iframe>