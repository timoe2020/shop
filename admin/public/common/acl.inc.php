<?php

session_start();

header("Content-Type: text/html;charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
if(!mysqli_set_charset($conn,"utf8")){
    echo"Error loading character set utf8: %s\n",mysqli_error($conn);
}
$username=$_SESSION['username'];

$sql="SELECT * FROM userdata where username='{$username}'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
//echo $row['username'];
//echo $row['admin'];
if(!$_SESSION['login']||!$row['admin'])
{
    echo "没有权限";

    exit("<a href='/shop/admin/login/login.html'>点击返回登录界面</a>");
}
