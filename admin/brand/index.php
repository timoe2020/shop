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
        <title>查看品牌</title>
    </head>
    <body>
    <header>
        <?php
        include "../index.php";
        ?>
    </header>
    <main>
    <?php
    $sql="select * from brand";
    $result=$conn->query($sql);

    echo"查看品牌:";
    echo"<table width='500px' border='1px' cellspacing='-'>";
    echo"<tr>";
    echo"<th>id</th>";
    echo"<th>品牌名称</th>";
    echo"<th>所属类别</th>";
    echo"<th>修改</th>";
    echo"<th>删除</th>";
    echo"</tr>";
    // 输出数据
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $ClassId=$row['shopclass_id'];

            $ClassRes = mysqli_query($conn,"SELECT * FROM shopclass
        WHERE id='$ClassId'");


            echo"<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            while($ClassRow = mysqli_fetch_array($ClassRes))
            {
                echo "<td>{$ClassRow['name']}</td>";
            }

            echo "<td><a href='edit.php?id={$row["id"]}'>修改</a></td>";
            echo "<td><a href='delete.php?id={$row["id"]}' >删除</a></td>";
            echo "</tr>";
        }
        echo"</table>";
    } else {
        echo "0 result";
    }
//    echo"<a href='add.php'>添加品牌</a>";
//    echo"<br>";
//    echo"<a href='../index.php'>返回管理系统主界面</a>"
    ?>
    </main>

    </body>
    </html>



