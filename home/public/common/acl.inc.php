<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!$_SESSION['login'])
{

    echo "请先登录";
    exit("<a href='/shop/home/login/login.php'>点击返回登录界面</a>");
}
