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
    <title>个人中心</title>
    <style>
        body{
            background:rgb(240,243,239) ;
            font-size: 15px;
        }
        a{
            text-decoration: none;
            color: black;
        }
        a:hover{
            color: red;
        }
        .space{
            height: 40px;
            background:rgb(240,243,239) ;
            color: #fc0303;

        }
        .sidebar{
            margin-left: 150px;
            padding: 20px;
            width: 140px;
            height: 400px;
            background: white;
            line-height: 40px;
            color: #fc0303;

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
    <div class="space">

    </div>

    <div class="content">
        <div class="space">
        </div>
        <div class="sidebar">
            <span><a href="index.php">首页>>个人中心</a></span>
            <div><a href="myorder.php">我的订单</a></div>
            <div><a href="information.php">收货信息</a></div>

        </div>
        <div class="connect-choose">

        </div>
        <div class="connect-box">

        </div>
        <div class="space">
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
