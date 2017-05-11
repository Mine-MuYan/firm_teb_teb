<?php

return array(
    'DB_TYPE'   =>  'mysql',
    'DB_HOST'   =>  '127.0.0.1',
    'DB_NAME'   =>  'daili',//数据库名字
    'DB_USER'   =>  'root',//数据库用户名
    'DB_PWD'    =>  '',//数据库密码
    'DB_PORT'   =>   3306 ,
    'DB_CHARSET'=>  'utf8',
    'DB_PREFIX' =>  '',
    'AUTH_KEY'  =>  '520efebc109577cc0a86de013d0164ac', //这个KEY只是保证部分表单在没有SESSION 的情况下判断用户本人操作的作用
    'BAO_KEY'   => '',

    //自定义success和error的提示页面模板
    'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',
    'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',
);
//return array(
//    'DB_TYPE'   =>  'mysql',
//    'DB_HOST'   =>  '114.55.248.130',
//    'DB_NAME'   =>  'tuerbao',//数据库名字
//    'DB_USER'   =>  'tuerbao',//数据库用户名
//    'DB_PWD'    =>  'kaihuoche',//数据库密码
//    'DB_PORT'   =>   3306 ,
//    'DB_CHARSET'=>  'utf8',
//    'DB_PREFIX' =>  '',
//    'AUTH_KEY'  =>  '520efebc109577cc0a86de013d0164ac', //这个KEY只是保证部分表单在没有SESSION 的情况下判断用户本人操作的作用
//    'BAO_KEY'   => '',
//
//    //自定义success和error的提示页面模板
//    'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',
//    'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',
//);

