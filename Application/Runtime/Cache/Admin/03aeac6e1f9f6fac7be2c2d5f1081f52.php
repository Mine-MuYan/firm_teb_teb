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

<body>
<div class="layout  bg-inverse fixed" style="z-index: 9;height: 100%">
    <div class="navbar bg-sub">
            <div class="navbar-head" style="width:15%;margin-left: 20px;height: 6%;">
                <button class="button icon-navicon" data-target="#navbar1">
                </button>
                <a href="<?php echo U('admin/start/dailihome');?>" target="_self">
                    <img style="width: 32px" src="/public/admin/images/login.png"/>
                    <span class="text-large">尚惠加盟商</span></a>
            </div>
            <div class="navbar-body nav-navicon" id="navbar1"><!--一级菜单-->
                <ul class="nav nav-inline nav-menu">
                    <?php if(is_array($menuList)): foreach($menuList as $key=>$var): if(($var["fmenu_id"] == 0) and ($var["is_show"] == 1) ): ?><li class="<?php echo ($var["style"]); ?>">
                                <a href="<?php echo ($var["menu_url"]); ?>" class="<?php echo ($var["class"]); ?>" rel="<?php echo ($var["menu_id"]); ?>"><?php echo ($var["menu_name"]); ?></a>
                            </li><?php endif; endforeach; endif; ?>
                </ul>
                <script>
                    $("#navbar1 ul li a").click(function () {
                        var fuid = ".fuid_" + $(this).attr("rel");
                        $(".sidebar ul").hide();
                        $(fuid).show();
                    })
                </script>
                <ul class="nav nav-inline nav-menu navbar-right">
                    <li>
                        <a target="_blank" href="<?php echo U('admin/loginout');?>">
                            <span class="icon-sign-out"></span>注销
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    <div class="sidebar">
    <?php if(is_array($menuList)): foreach($menuList as $key=>$var): if(($var["fmenu_id"] == 0) and ($var["is_show"] == 1) ): ?><ul class='list-unstyle fuid_<?php echo ($var["menu_id"]); ?>' id='Two-level-menu'>
                    <?php if(is_array($menuList)): foreach($menuList as $key=>$var2): if(($var2["fmenu_id"]) == $var["menu_id"]): ?><li class="two-li"><!--二级菜单-->
                                <div>
                                    <a href="<?php echo ($var2["menu_url"]); ?>"><?php echo ($var2["menu_name"]); ?></a>
                                    <span class='icon-angle-down' style='margin-left: 40px;height: 20px;width: 20px'></span>
                                </div>
                                <ul class='list-unstyle'>
                                    <?php if(is_array($menuList)): foreach($menuList as $key=>$var3): if(($var3["fmenu_id"]) == $var2["menu_id"]): ?><a href="/index.php/admin/<?php echo ($var3["menu_url"]); ?>"><li><p><?php echo ($var3["menu_name"]); ?></p></li></a><!--三级菜单--><?php endif; endforeach; endif; ?>
                                </ul>
                            </li><?php endif; endforeach; endif; ?>
                </ul><?php endif; endforeach; endif; ?>
    </div>

    <div class="layout" style="width: 85%;float:right;">
        <ul class="bread bg">
            <li id="first_menu"><a href="javascript:;" class="icon-home text-sub">首页</a></li>
        </ul>
        <iframe frameborder=0 width=100% marginheight=0 marginwidth=0 scrolling=auto name="iframe"
                src="<?php echo U('admin/start/homepage');?>"></iframe>
    </div>
</div>
</body>
<script>
    var height = $(window).height() - 100;
    $(function () {
        $("iframe").attr("height", height);
    });
    $(function () {
        if (!$("ul")) {
            $(this).remove();
        }
    });
    $(".sidebar a").click(function () {
        if ($(this).attr("href") != "javascript:;") {
            $(".bread").html("");
        }
        var url = $(this).attr("href");
        $.ajax({
            type: "POST",
            url: "/index.php/admin/start/dailihomeAjax",
            data: {"url": url},
            dataType: 'json',
            success: function (data) {
                for (var k in data) {
                    $(".bread").append("<li><a href='" + data[k].menu_url + "' class='" + data[k].class + " text-sub'>" + data[k].menu_name + "</a></li>")
                }
            }
        });
    })
</script>