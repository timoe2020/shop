<?php
session_start();
include "../public/common/dbconfig.inc.php";
//获取表单信息
$realname=$_POST['realname'];
$address=$_POST['address'];
$telephone=$_POST['telephone'];
$email=$_POST['email'];

//获取用户id
$username= $_SESSION['username'];
$sqlUser="select * from userdata where username='{$username}'";
$ResUser=$conn->query($sqlUser);
$RowUser=$ResUser->fetch_assoc();
$user_id=$RowUser['id'];
echo"$user_id";

//将信息插入数据库
$sqlInfo="insert into relation ( realname, address, telephone, email, user_id) values
            ('$realname','$address','$telephone','$email','$user_id')";
if($ResInfo=$conn->query($sqlInfo)) {
    header("Location:information.php");
}
else{
    echo "error",$conn->error,"<br>";
    echo "sql:",$sqlInfo;
}
