<?php

include"../../public/common/dbconfig.inc.php";

$username= $_POST['username'];
$password= $_POST['password'];
$repassword= $_POST['repassword'];
$verify= $_POST['verify'];
$regtime=time();
//输出变量
//echo "username:$username<br>password:$password<br>verify:$verify<br>$regtime<br>";

//验证用户名是否存在
$sqlUser="select * from userdata where username='{$username}'";
$resUser= $conn->query($sqlUser);

if($resUser->num_rows>0)
{
//    echo "hhh,$resUser";
    echo"用户名已存在，请换一个用户名或者去<a href='login.php'>登录</a><br>";

}
//验证密码是否一致
else if($password!=$repassword){
    echo"两次输入的密码不一致，请重新输入<br>";
//    echo"<a href='register.php'>点击返回注册界面</a>";
    header("Refresh:5;url=register.php");
}
//验证验证码是否正确
else if($verify!=90849)
{
    echo"验证码不正确请重新输入<br>";
    header("Refresh:5;url=register.php");
}



else{
    $sql="insert into userdata ( username, password, regtime, admin) VALUE ('$username','$password','$regtime','0')";
    if($conn->query($sql))
    {
        echo "注册成功!<br>";
        echo"<a href='login.php'>去登陆</a>";
    }
    else{
        echo "error:".$sql."<br>".$conn->error;
    }
}
