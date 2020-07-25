<?php
include '../../public/common/dbconfig.inc.php';
$username=$_POST['username'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$regtime=time();

if($password===$repassword){
    $sqlUser="INSERT INTO userdata (username, password,regtime,admin)
VALUES ('$username', '$password','$regtime','0')";
    if($conn->query($sqlUser))
    {
        echo "添加成功!<br>";
    }
    else{
        echo "error:".$sqlUser."<br>".$conn->error;
    }
}
else{
    echo "Two password entries are inconsistent";
}
echo "<a href='add.php'>点击返回添加界面</a>";
