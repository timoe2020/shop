<?php
session_start();
include "../public/common/dbconfig.inc.php";
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
    <style>
        .order-box{
            width: 280px;
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
        <div class="order-box">
            <table  border="1" cellspacing="0" >
                <tr>
                    <th>订单ID</th>
                    <th>订单号</th>
                    <th>用户ID</th>
                    <th>时间</th>
                </tr>
            <?php
            //查找用户id
            $username= $_SESSION['username'];
            $sqlUser="select * from userdata where username='{$username}'";
            $ResUser=$conn->query($sqlUser);
            $RowUser=$ResUser->fetch_assoc();
            $user_id=$RowUser['id'];
            $sqlOrder = "SELECT * FROM orderdata  where user_id=$user_id";
            $resultOrder = $conn->query($sqlOrder);

            if ($resultOrder->num_rows > 0) {
                // 输出数据
                $OrderCode = 0;
                while ($rowOrder = $resultOrder->fetch_assoc()) {

                    if ($OrderCode != $rowOrder['code']) {
                        $OrderCode = $rowOrder['code'];
                    } else {
                        continue;
                    }
                    echo "<tr>";
                    echo "<td>{$rowOrder["id"]}</td>";
                    echo "<td><a href='OrderInfo.php?code={$rowOrder['code']}'>{$rowOrder["code"]}</a></td>";
                    echo "<td>{$rowOrder["user_id"]}</td>";

                    echo "<td>" . date("Y-m-d H:i:s", $rowOrder["time"]) . "</td>";


                    echo "</tr>";
                }
            } else {
                echo "0 结果";
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
