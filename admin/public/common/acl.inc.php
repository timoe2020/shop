<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if($_SESSION['login']&&$_SESSION['admin'])
{
//    echo "登录成功！";
//    echo "<a href='logout.php'>登出</a>";
    echo "<br>";
//    echo "<a href='/shop/admin/index.php'>跳转到管理系统</a>";
}
else
{
    echo "没有权限";

    exit("<a href='/shop/admin/login/login.html'>点击返回登录界面</a>");
}