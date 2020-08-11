<?php


//echo $_GET['shop_id'];

include '../public/common/dbconfig.inc.php';
include '../public/common/acl.inc.php';
session_start();
$shop_id = $_GET['shop_id'];
$sqlCart = "delete from cart where shop_id='{$shop_id}'";
if ($conn->query($sqlCart)) {
    echo "删除成功!<br>";
    echo "<a href='index.php?user_id=$$user_id'>点击跳转到购物车页面</a>";
} else {
    echo "error:" . $sqlCart . "<br>" . $conn->error;
}