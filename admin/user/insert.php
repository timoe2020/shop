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

    ?>

</main>

</body>
</html>
