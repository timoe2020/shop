<?php
include '../../public/common/dbconfig.inc.php';
$username=$_POST['username'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$id=$_POST['id'];
$admin=$_POST['admin'];


if($password===$repassword){
    $sqlUser="UPDATE  userdata SET username='$username', password='$password'
    WHERE id='$id'";

    if($conn->query($sqlUser))
    {
        echo "更改成功<br>";
    }
    else{
        echo "error:".$sqlUser."<br>".$conn->error;
    }
}
else{
    echo "两次输入密码不一致";
}
echo "<a href='edit.php'>点击返回修改页面</a>";
