<?php
session_start();
include "public/common/acl.inc.php";
header("Content-Type: text/html;charset=utf-8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物后台系统</title>
    <link rel="stylesheet" type="text/css" href="/shop/admin/public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/shop/admin/public/css/style.css">


</head>
<body>
<div id="header">
    <div id="logo"></div>
    <div id="title">购物后台管理系统</div>
    <div id="time"></div>
</div>
<div id="content">
    <div id="sidebar">
        <div class="title">购物后台管理系统</div>
        <div id="menu">
            <ul>

                <li class="describe">
                    您好,<span><?php echo $_SESSION['username']?></span>
                    <a href="login/logout.php">[登出]</a>
                </li>
                <li class="function manage">
                    <a href="#" >用户管理</a>
                    <div class="bar">
                        <a href="/shop/admin/user/index.php"   class="check">查看用户</a>
                        <a href="/shop/admin/user/add.php"   class="add">添加用户</a>
                    </div>
                </li>
                <li class="function shopclass">
                    <a href="#">分类管理</a>
                    <div class="bar">
                        <a href="/shop/admin/shopclass/index.php"   class="check">查看分类</a>
                        <a href="/shop/admin/shopclass/add.php"   class="add">添加分类</a>
                    </div>
                </li>
                <li class="function brand">
                    <a href="#">品牌管理</a>
                    <div class="bar">
                        <a href="/shop/admin/brand/index.php"   class="check">查看品牌</a>
                        <a href="/shop/admin/brand/add.php"   class="add">添加品牌</a>
                    </div>
                </li>
                <li class="function shop">
                    <a href="#">商品管理</a>
                    <div class="bar">
                        <a href="/shop/admin/shop/index.php"   class="check">查看商品</a>
                        <a href="/shop/admin/shop/add.php"   class="add">添加商品</a>
                    </div>
                </li>
                <li class="function">
                    <a href="/shop/admin/OrderState/index.php">订单状态</a>
                </li>
                <li class="function order">
                    <a href="#">订单管理</a>
                    <div class="bar">
                        <a href="/shop/admin/order/index.php"   class="check">查看订单</a>
                    </div>
                </li>

            </ul>
        </div>
        <div class="loginbar">
            <ul>
                <li>
                    <a href="login/logout.php">注销</a>
                </li>
            </ul>
        </div>

    </div>
    <div id="main">

        <div id="tab_container"></div>
    </div>

</div>
<div id="footer"></div>
</body>
</html>
