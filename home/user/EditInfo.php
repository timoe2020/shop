<?php
session_start();
include'../public/common/dbconfig.inc.php';
$id= $_GET['id'];


//获得用户id
$username= $_SESSION['username'];
$sqlUser="select * from userdata where username='{$username}'";
$ResUser=$conn->query($sqlUser);
$RowUser=$ResUser->fetch_assoc();
$user_id=$RowUser['id'];
//echo"$user_id";

//通过用户id查找用户要修改的那条信息
$sqlUser = "SELECT * FROM relation WHERE id='$id'";
$result = $conn->query($sqlUser);
$rowRel = mysqli_fetch_array($result);
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
        .edit-box{
            width: 260px;
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
        <?php
        include '../public/UserSide.php';
        ?>
        <div class="edit-box">
            <p><b>修改收货地址：</b></p>
        <form method="post" action="UpdateInfo.php">
            <div>
                <span>真实姓名</span>
                <input type="text" name="realname" value="<?php echo $rowRel['realname']?>">
            </div>
            <div>
                <span>收货地址</span>
                <input type="text" name="address" value="<?php echo $rowRel['address']?>">
            </div>
            <div>
                <span>手机号码</span>
                <input type="text" name="telephone" value="<?php echo $rowRel['telephone']?>">
            </div>
            <div>
                <span>电子邮箱</span>
                <input type="text" name="email" value="<?php echo $rowRel['email']?>">
            </div>
<!--            <input type="hidden" name="user_id" value="--><?php //echo $rowRel['user_id']?><!--">-->
            <input type="hidden" name="id" value="<?php echo $rowRel['id']?>">
            <input type="submit" value="修改">
            <input type="reset" value="重置">

        </form>
        </div>
    </main>
    <footer>
        <?php
        include "../public/footer.php";
        ?>
    </footer>

</body>
</html>
