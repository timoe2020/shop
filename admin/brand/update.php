<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>更新成功</title>
</head>
<body>
<header>
    <?php
    include "../index.php";
    ?>
</header>
<main>
    <?php
header("Content-Type: text/html;charset=utf-8");
include '../public/common/acl.inc.php';
include '../../public/common/dbconfig.inc.php';
$name=$_POST['name'];
$classId=$_POST['classId'];
$id=$_POST['id'];

//echo $name,'classid=',$classId,'id=',$id;

if($name){
    $sql="UPDATE brand SET name='$name' ,shopclass_id='$classId'
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
//echo "<a href='EditInfo.php'>点击返回编辑页面</a>";?>
</main>

</body>
</html>





