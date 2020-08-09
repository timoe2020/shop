<?php
include '../public/common/acl.inc.php';
include'../../public/common/dbconfig.inc.php';
header("Content-Type: text/html;charset=utf-8");
$id=$_GET['id'];

$sqlOrder = "SELECT * FROM orderdata WHERE id='$id'";
$result = $conn->query($sqlOrder);
$row = mysqli_fetch_array($result);

$sqlStat=' SELECT * FROM orderstat';
$StatRes = $conn->query($sqlStat);


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
<header>
    <?php
    include '../index.php';
    ?>
</header>
<main>
<p><b>修改订单状态：</b></p>
<form action="update.php" method="post">
    <table border="1px" cellspacing="0">
        <tr>
            <td>订单号：</td>
            <td>
                <label>
                    <input type="text" name="code" value="<?php echo $row['code']?>" disabled="disabled">
                </label>
            </td>
        </tr>
        <tr>
            <td>订单状态：</td>
            <td>
                <select name="state" id="">
                    <option value="">--选择分类--</option>
                    <?php
                    if ($StatRes->num_rows > 0) {
                        // 输出数据
                        while($row = $StatRes->fetch_assoc()) {
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
            <input type="hidden" name="id" value="<?php echo $id?>">
            <td>
                <input type="submit" value="提交">
                <input type="reset" value="重置">
            </td>
        </tr>

    </table>
</form>
</main>
</body>
</html>


