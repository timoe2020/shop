<?php
include '../public/common/acl.inc.php';
include'../../public/common/dbconfig.inc.php';
header("Content-Type: text/html;charset=utf-8");
$sqlUser = "SELECT * FROM userdata order by id";
$resultUser = $conn->query($sqlUser);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>查看用户</title>

</head>
<body>
<header>
    <?php
    include'../index.php';
    ?>
</header>
<main>
    <p><b>查看用户</b></p>
    <table width="500" border="1" cellspacing="0">
        <tr>
            <th>用户ID</th>
            <th>用户名</th>
            <th>密码</th>
            <th>注册时间</th>
            <th>管理员</th>
            <th>修改</th>
            <th>删除</th>
        </tr>
        <?php
        if ($resultUser->num_rows > 0) {
            // 输出数据
            while($rowUser = $resultUser->fetch_assoc()) {
                echo "<tr>";
                echo"<td>{$rowUser["id"]}</td>";
                echo"<td>{$rowUser["username"]}</td>";
                echo"<td>{$rowUser["password"]}</td>";
                echo"<td>".date("Y-m-d H:i:s",$rowUser["regtime"])."</td>";
                echo"<td>{$rowUser["admin"]}</td>";
                echo "<td><a href='edit.php?id={$rowUser["id"]}'>修改</a></td>";
                echo "<td><a href='delete.php?id={$rowUser["id"]}' >删除</a></td>";
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
