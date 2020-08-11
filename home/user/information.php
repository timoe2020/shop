<?php
session_start();
include "../public/common/dbconfig.inc.php";
$username= $_SESSION['username'];
$sqlUser="select * from userdata where username='{$username}'";
$ResUser=$conn->query($sqlUser);
$RowUser=$ResUser->fetch_assoc();
$user_id=$RowUser['id'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .connect-box{
            width: 460px;
            display: block;
            position: relative;
            top: -400px;
            left: 400px;
            background: white;
        }

    </style>
</head>
<body>
    <header>
        <?php
        include "../public/header.php";
        ?>
    </header>
    <main>
        <div class="nav">
        </div>
        <div class="content">
           <?php
            include '../public/UserSide.php';
           ?>
            <div class="connect-box">
                <div class="add"><a href="AddInfo.php">新增收货信息</a></div>
                <table border="1" cellspacing="0" align="center">
                    <tr>
                        <td>姓名</td>
                        <td>地址</td>
                        <td>电话</td>
                        <td>邮箱</td>
                        <td>修改</td>
                        <td>删除</td>
                    </tr>
                    <?php
                    $sqlInfo="select * from relation where user_id='{$user_id}'";
                    $ResInfo=$conn->query($sqlInfo);
                    while ($RowInfo=$ResInfo->fetch_assoc())
                    {
                        echo"<tr>";

                        echo "<td>{$RowInfo['realname']}</td>";
                        echo "<td>{$RowInfo['address']}</td>";
                        echo "<td>{$RowInfo['telephone']}</td>";
                        echo "<td>{$RowInfo['email']}</td>";
                        echo "<td><a href='EditInfo.php?id={$RowInfo['id']}'>修改</a></td>";
                        echo "<td><a href='DelInfo.php?id={$RowInfo['id']}'>删除</a></td>";
                        echo "</tr>";
                    }
                    ?>

                </table>
            </div>
        </div>

    </main>
    <footer>
        <?php
        include "../public/footer.php";
        ?>

    </footer>

</body>
</html>
