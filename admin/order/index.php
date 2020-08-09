<?php
include '../public/common/acl.inc.php';
include'../../public/common/dbconfig.inc.php';
header("Content-Type: text/html;charset=utf-8");
$sqlOrder = "SELECT * FROM orderdata  order by orderdata.code ";
$resultOrder = $conn->query($sqlOrder);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>查看订单</title>

</head>
<body>
<header>
    <?php
    include '../index.php';
    ?>
</header>
<main>
<p><b>查看订单</b></p>

<table  border="1" cellspacing="0" >
    <tr>
        <th>订单ID</th>
        <th>订单号</th>
        <th>用户ID</th>
<!--        <th>商品ID</th>-->
<!--        <th>订单数目</th>-->
<!--        <th>订单价格</th>-->
        <th>时间</th>
<!--        <th>状态</th>-->
<!--        <th>用户信息</th>-->
<!--        <th>修改</th>-->
<!--        <th>删除</th>-->
    </tr>
    <?php
    if ($resultOrder->num_rows > 0) {
        // 输出数据
        $OrderCode=0;
        while($rowOrder = $resultOrder->fetch_assoc()) {

            if($OrderCode!=$rowOrder['code'])
            {
                $OrderCode=$rowOrder['code'];
            }
            else{
                continue;
            }
//            $StatId=$rowOrder['orderstat_id'];
//            $StatRes = mysqli_query($conn,"SELECT * FROM orderstat
//        WHERE id='$StatId' ");
            echo "<tr>";
            echo"<td>{$rowOrder["id"]}</td>";
            echo"<td><a href='OrderInfo.php?code={$rowOrder['code']}'>{$rowOrder["code"]}</a></td>";
            echo"<td>{$rowOrder["user_id"]}</td>";
//            echo"<td>{$rowOrder["shop_id"]}</td>";
//            echo"<td>{$rowOrder["num"]}</td>";
//            echo"<td>{$rowOrder["price"]}</td>";
            echo"<td>".date("Y-m-d H:i:s",$rowOrder["time"])."</td>";

//            while($StatRow = mysqli_fetch_array($StatRes))
//            {
//                echo "<td>{$StatRow['name']}</td>";
//            }
//            echo"<td>{$rowOrder["relation_id"]}</td>";

//                echo"<td>{$rowOrder["brand_id"]}</td>";
//            echo "<td><a href='EditInfo.php?id={$rowOrder["id"]}'>修改</a></td>";
//            echo "<td><a href='relation.php?id={$rowOrder["id"]}' target='_blank'>删除</a></td>";
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


