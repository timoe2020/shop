<?php
include '../public/common/acl.inc.php';
include'../../public/common/dbconfig.inc.php';
header("Content-Type: text/html;charset=utf-8");
$sqlUser = "SELECT * FROM orderstat order by id";
$resultUser = $conn->query($sqlUser);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>查看状态</title>

</head>
<body>
    <header>
        <?php
        include '../index.php';
        ?>
    </header>
    <main>
    <p><b>查看状态：</b></p>
    <table width="500" border="1" cellspacing="0">
        <tr>
            <th>状态ID</th>
            <th>状态</th>

        </tr>
        <?php
        if ($resultUser->num_rows > 0) {
            // 输出数据
            while($rowUser = $resultUser->fetch_assoc()) {
                echo "<tr>";
                echo"<td>{$rowUser["id"]}</td>";
                echo"<td>{$rowUser["name"]}</td>";

//                echo "<td><a href='EditInfo.php?id={$rowUser["id"]}'>修改</a></td>";
//                echo "<td><a href='relation.php?id={$rowUser["id"]}' target='_blank'>删除</a></td>";
                echo "</tr>";
            }
        } else {
            echo "0 结果";
        }


        ?>
    </table>
    </main>
</body>
</html>
