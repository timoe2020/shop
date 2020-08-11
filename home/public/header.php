<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/font-awesome.css">
    <style>
        body{
            color: rgb(176,176,176);
            font-size: 12px;
        }
        #header{
            position: absolute;
            background: rgb(51,51,51);
            width: 100%;
            height: 40px;

        }
        #header a{
            color: rgb(176,176,176);
            font-size: 12px;
            line-height: 40px;
            text-decoration: none;
        }
        #header a:hover{
            color: white;
        }
        #top-nav{
            margin: 0 140px;
            width: 80%;
        }
        .line{
            color: rgb(62,57,52);
            margin: 0 6px;
        }

        #FirstPage{
            display: inline-block;
            width: 550px;
            line-height: 40px;
            margin-right: 210px;
            left: 0;
        }
        #LogBar{
            display: inline-block;
            /*width:300px;*/
            line-height: 40px;
            margin-left: 40px;
        }
        .word{
            position: relative;
            display: inline-block;
            line-height: 40px;
            width: 60px;
            z-index: 3;
        }
        #username{
            width: 80px;
        }
        #username:hover{
            width: 80px;
            display: inline-block;
            line-height: 40px;
            background: white;
            color: orange;
        }

    </style>
</head>
<body>
    <div id="header">
        <div id="logo"></div>
        <div id="top-nav">
            <span id="FirstPage">
                <a href="/shop/home/index.php">商城首页</a>
            </span>
            <span id="LogBar">
                <?php
                if($_SESSION['login']==1)
                {
                    ?>
                    <span id="username" class="word">欢迎,<?php echo$_SESSION['username']?></span>
                    <span class="line">|</span>
                    <span class="word center"><a href="/shop/home/user/index.php">个人中心</a></span>
                    <span class="line">|</span>
                    <span class="word out"><a href="/shop/home/login/logout.php">退出</a></span>
                    <span class="line">|</span>
                    <span class="word"><a href="/shop/home/cart/index.php">购物车<i class="fa fa-shopping-cart" aria-hidden="true"></i></a></span>

                    <?php
                }
                ?>
                <?php
                if($_SESSION['login']!=1){
                    ?>
                    <span class="word"><a href="/shop/home/login/login.php">登录</a></span>
                    <span class="line">|</span>
                    <span class="word"><a href="/shop/home/login/register.php">注册</a></span>


                    <?php
                }
                ?>

            </span>
        </div>


    </div>

</body>
</html>



