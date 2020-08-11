<?php
header("Content-Type: text/html;charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "thu666666";
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


?>

