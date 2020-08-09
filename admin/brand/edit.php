<?php
header("Content-Type: text/html;charset=utf-8");
include '../public/common/acl.inc.php';
include "../../public/common/dbconfig.inc.php";
$sqlClass=' SELECT * FROM shopclass';
$classRes = $conn->query($sqlClass);

//echo $_GET['id'];
$id=$_GET['id'];


$sqlBrand = "SELECT * FROM brand WHERE id='$id'";
$result = $conn->query($sqlBrand);
$row = mysqli_fetch_array($result);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改品牌</title>
</head>
<body>
<header>
    <?php
    include "../index.php";
    ?>
</header>
<main>
<p><b>修改品牌：</b></p>
<form action="update.php" method="post" target="_self">
    <span>品牌：</span>
    <input type="text" name="name" value="<?php echo $row['name']?>">
    <br>
    <span>分类：</span>
    <select name="classId" id="">
        <option value="">--选择分类--</option>
        <?php
        if ($classRes->num_rows > 0) {
            // 输出数据
            while($row = $classRes->fetch_assoc()) {
                echo "<option  value='{$row['id']}'>{$row['name']}</option>";
            }
        } else {
            echo "0 结果";
        }
        ?>
    </select>
    <br>
    <input type="hidden" name="id" value="<?php echo $id?>">
    <input type="submit" value="提交">
    <input type="reset" value="重置">
</form>

</main>
</body>
</html>



