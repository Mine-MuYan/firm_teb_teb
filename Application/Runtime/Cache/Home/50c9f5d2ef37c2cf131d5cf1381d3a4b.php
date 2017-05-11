<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>兔尔宝加盟商-用户登录</title>
    <link rel="stylesheet" href="/public/home/css/login.css">
    <script src="/public/home/js/jquery.js"></script>
    <script src="/public/home/layer/layer.js"></script>
    <script src="/public/home/js/common.js"></script>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>

<body>
<div class="logo">
    <img src="/public/home/images/logo.png">
</div>
<p class="wapName">
    兔尔宝
</p>
<form method="post" action="<?php echo U('home/login/index');?>" target="niu-frame">
    <table class="form">
        <tr class="username">
            <td>
                <span><img src="/public/home/images/username.png"></span>用户名
                <input type="text" name="username">
            </td>
        </tr>
        <tr class="password">
            <td>
                <span><img src="/public/home/images/password.png"></span>密&nbsp;&nbsp;&nbsp;码
                <input type="password" name="password">
            </td>
        </tr>
    </table>
    <button class="button" type="submit">登录</button>
</form>
<iframe name="niu-frame" style="display: none"></iframe>
</body>
</html>