<?php
include'../public/common/dbconfig.inc.php';
include '../public/common/acl.inc.php';
session_start();
$shop_id= $_GET['shop_id'];
$username=$_SESSION['username'];

//根据用户名找用户id
$sqlUser="select * from userdata where username='{$_SESSION['username']}'";
$ResUser=$conn->query($sqlUser);
$RowUser=$ResUser->fetch_assoc();
$user_id= $RowUser['id'];
$order_id=0;





$sqlCart="INSERT INTO cart (shop_id, user_id, order_id)
VALUES ('$shop_id','$user_id','$order_id')";
if($conn->query($sqlCart))
{
    echo "添加成功!<br>";
    echo"<a href='index.php?user_id=$$user_id'>点击跳转到购物车页面</a>";
}
else{
    echo "error:".$sqlCart."<br>".$conn->error;
}

?>

