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
    $name=$_POST['name'];
    $id=$_POST['id'];



    if($name){
        $sql="UPDATE  shopclass SET name='$name'
    WHERE id='$id'";
//    echo"$sqlUser";
        if($conn->query($sql))
        {
            echo "更新成功!<br>";
        }
        else{
            echo "error:".$sql."<br>".$conn->error;
        }
    }
    else{
        echo "名称不能为空";
    }
    ?>
</main>
</body>
</html>



