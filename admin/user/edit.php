<?php
include '../public/common/acl.inc.php';
include'../../public/common/dbconfig.inc.php';
header("Content-Type: text/html;charset=utf-8");

//while($row = mysqli_fetch_array($result))
//{
//    echo $row['username'],$row['password'];
//    echo "<br>";
//}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改用户</title>
</head>
<body>
<header>
    <?php
    include'../index.php';
    $id=$_GET['id'];

    $sqlUser = "SELECT * FROM userdata WHERE id='$id'";

    $result = $conn->query($sqlUser);
    $row = mysqli_fetch_array($result);
    ?>
</header>
<main>
<p><b>修改用户：</b></p>
<form action="update.php" method="post">
    <table border="1px" cellspacing="0">
        <tr>
            <td>用户名：</td>
            <td>
                <label>
                    <input type="text" name="username" value="<?php echo $row['username']?>">
                </label>
            </td>
        </tr>
        <tr>
            <td>密码：</td>
            <td>
                <label>
                    <input type="password" name="password" value="">
                </label>
            </td>
        </tr>
        <tr>
            <td>确认密码：</td>
            <td>
                <label>
                    <input type="password" name="repassword" value="">
                </label>
            </td>
        </tr>
        <tr>
            <td>管理员：</td>
            <td>
            <?php
            if($row['admin']){
                echo"<input type='radio' name='admin' value='1' checked>是";
                echo"<input type='radio' name='admin' value='0' >否";
            }
            else{
                echo"<input type='radio' name='admin' value='1' >是";
                echo"<input type='radio' name='admin' value='0' checked>否";
            }
            ?>
            </td>
        </tr>
        <tr>
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <td>
                <input type="submit" value="提交">

            </td>
            <td>
                <input type="reset" value="重置">
            </td>
        </tr>

    </table>
</form>
</main>
</body>
</html>
