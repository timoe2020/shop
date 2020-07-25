<?php
include "../../public/common/dbconfig.inc.php";
$sqlClass="select * from shopclass";
$result=$conn->query($sqlClass);

if ($result->num_rows > 0) {
    echo"商品分类:";
    echo"<table width='500px' border='1px' cellspacing='-'>";
    echo"<tr>";
    echo"<th>id</th>";
    echo"<th>商品名称</th>";
    echo"<th>修改</th>";
    echo"<th>删除</th>";
    echo"</tr>";
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo"<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td><a href='edit.php?id={$row["id"]}'>修改</a></td>";
        echo "<td><a href='delete.php?id={$row["id"]}' target='_blank'>删除</a></td>";
        echo "</tr>";
    }
    echo"</table>";
} else {
    echo "0 result";
}
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
<?php
    echo"<a href='add.php'>添加商品分类</a>";
    echo"<br>";
    echo"<a href='../index.php'>返回管理系统主界面</a>"
?>

</body>
</html>

