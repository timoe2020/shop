<?php
include '../public/common/acl.inc.php';
include "../../public/common/dbconfig.inc.php";
header("Content-Type: text/html;charset=utf-8");


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加商品</title>

</head>
<body>
    <header>
        <?php
        include '../index.php';
        $sqlBrand=' SELECT * FROM brand';
        $BrandRes = $conn->query($sqlBrand);

        $sqlClass=' SELECT * FROM shopclass';
        $ClassRes = $conn->query($sqlClass);
        ?>
    </header>
    <main>
        <p><b>添加商品：</b></p>
        <form action="insert.php" method="post" target="_self">
            <table border="1px" cellspacing="0">
                <tr>
                    <td>商品名称：</td>
                    <td>
                        <label>
                            <input type="text" name="name">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>商品价格：</td>
                    <td>
                        <label>
                            <input type="text" name="price">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>商品库存：</td>
                    <td>
                        <label>
                            <input type="text" name="stock">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>是否上架：</td>
                    <td>
                        <label>
                            <input type="radio" name="upshelf" value="1" checked>是
                            <input type="radio" name="upshelf" value="0">否
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>商品图片：</td>
                    <td>
                        <label >
                            <input type="text" name="img" value="null" >
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>品牌名称：</td>
                    <td>
                    <select name="BrandId" id="">
                        <option value="">--选择品牌--</option>
                        <?php
                        if ($BrandRes->num_rows > 0) {
                            // 输出数据
                            while($row = $BrandRes->fetch_assoc()) {
                                echo "<option  value='{$row['id']}'>{$row['name']}</option>";
                            }
                        } else {
                            echo "0 结果";
                        }
                        ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>所属类别：</td>
                    <td>
                        <select name="ClassId" id="">
                            <option value="">--选择类别--</option>
                            <?php
                            if ($ClassRes->num_rows > 0) {
                                // 输出数据
                                while($row = $ClassRes->fetch_assoc()) {
                                    echo "<option  value='{$row['id']}'>{$row['name']}</option>";
                                }
                            } else {
                                echo "0 结果";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="提交">
                        <input type="reset" value="重置">
                    </td>
                </tr>
                <tr>
                    <a href="../index.php">返回管理系统主界面</a>
                </tr>
            </table>
        </form>
    </main>
</body>
</html>

