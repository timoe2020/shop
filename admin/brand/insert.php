<?php
header("Content-Type: text/html;charset=utf-8");
include '../public/common/acl.inc.php';
include "../../public/common/dbconfig.inc.php";




?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加成功</title>
</head>
<body>
<header>
    <?php
    include "../index.php";
    ?>
</header>
<main>
<?php
$classId=$_POST['classId'];
$name=$_POST['name'];
$sql = "INSERT INTO brand (name,shopclass_id)
VALUES ('$name', '$classId')";

if ($conn->query($sql)) {
    echo "添加成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//echo"<br>";
//echo"<a href='add.php'>添加品牌</a>";
//echo"<br>";
//echo"<a href='../index.php'>返回管理系统主界面</a>"
?>
</main>
</body>
</html>

