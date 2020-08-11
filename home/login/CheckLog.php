<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
include"../../public/common/dbconfig.inc.php";
$username= $_POST['account'];
$password= $_POST['password'];


$sql="SELECT * FROM userdata where username='{$username}' and password='{$password}'";
$result=$conn->query($sql);

if ($result->num_rows > 0)
{
    // 输出数据
    while($row = $result->fetch_assoc())
    {
        $_SESSION['username']=$username;
        $_SESSION['login']=1;
        if($_SESSION['login'])
        {
            echo "登录成功！";
            header('location:../index.php');
        }
    }
}
else
{
    echo "账号或密码错误，请重新输入";
    echo"<a href='login.php'>点击返回登录界面</a>";
}





