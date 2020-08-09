<?php
include '../public/common/acl.inc.php';
include '../../public/common/dbconfig.inc.php';
header("Content-Type: text/html;charset=utf-8");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <?php
            include '../index.php';
        ?>

    </header>
    <main>
        <?php
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

        ?>

    </main>

</body>
</html>


