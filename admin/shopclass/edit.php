<?php
include'../../public/common/dbconfig.inc.php';
$id=$_GET['id'];

$sqlUser = "SELECT * FROM shopclass WHERE id='$id'";

$result = $conn->query($sqlUser);
$row = mysqli_fetch_array($result);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改商品分类</title>
</head>
<body>
<p><b>修改商品分类：</b></p>
<form action="update.php" method="post" target="_self">
    <table border="1px" cellspacing="0">
        <tr>
            <td>用户名：</td>
            <td>
                <label>
                    <input type="text" name="name" value="<?php echo $row['name']?>">
                </label>
            </td>
        </tr>

        <tr>
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
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
</body>
</html>

