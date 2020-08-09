<?php
include '../public/common/acl.inc.php';
include'../../public/common/dbconfig.inc.php';
header("Content-Type: text/html;charset=utf-8");



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>查看商品</title>

</head>
<body>
    <header>
        <?php
        include '../index.php';
        $sqlShop = "SELECT * FROM shop order by id";
        $resultShop = $conn->query($sqlShop);
        ?>
    </header>
    <main>
    <p><b>查看商品</b></p>
    <table  border="1" cellspacing="0" >
        <tr>
            <th>商品ID</th>
            <th>商品名称</th>
            <th>商品价格</th>
            <th>商品库存</th>
            <th>是否上架</th>
            <th>商品图片</th>
            <th>品牌名称</th>
            <th>修改</th>
            <th>删除</th>
        </tr>
        <?php
        if ($resultShop->num_rows > 0) {
            // 输出数据
            while($rowShop = $resultShop->fetch_assoc()) {

                $BrandId=$rowShop['brand_id'];
                $BrandRes = mysqli_query($conn,"SELECT * FROM brand
        WHERE id='$BrandId'");
                echo "<tr>";
                echo"<td>{$rowShop["id"]}</td>";
                echo"<td>{$rowShop["name"]}</td>";
                echo"<td>{$rowShop["price"]}</td>";
                echo"<td>{$rowShop["stock"]}</td>";
                echo"<td>{$rowShop["upshelf"]}</td>";
                echo"<td>{$rowShop["image"]}</td>";
                while($BrandRow = mysqli_fetch_array($BrandRes))
                {
                    echo "<td>{$BrandRow['name']}</td>";
                }
//                echo"<td>{$rowShop["brand_id"]}</td>";
                echo "<td><a href='edit.php?id={$rowShop["id"]}'>修改</a></td>";
                echo "<td><a href='delete.php?id={$rowShop["id"]}' target='_blank'>删除</a></td>";
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
