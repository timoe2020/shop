
<?php

session_start();
header("Content-Type: text/html;charset=utf-8");
include "../public/common/dbconfig.inc.php";
//得到评论内容
$commit=  $_POST['commit'];


//得到商品id
$shop_id= $_POST['shop_id'];


//根据用户名找用户id
$username=$_SESSION['username'];
$sqlUser="select * from userdata where username='{$username}'";
$ResUser=$conn->query($sqlUser);
$RowUser=$ResUser->fetch_assoc();
$user_id= $RowUser['id'];

//获得时间
$time=time();

//把用户id，商品id，评论内容插入commit表
$sqlCommit="insert into commit ( shop_id, user_id, content,time) VALUE ('$shop_id','$user_id','$commit','$time') ";
$ResCommit=$conn->query($sqlCommit);
//$RowCommit=$ResCommit->fetch_assoc();
//跳转页面
header("Location:shopinfo.php?id={$shop_id}");
echo "添加评论成功！";
echo "<a href='shopinfo.php'>点击返回商品详情页面</a>";