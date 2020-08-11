<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="../public/css/reset.css">
    <style>
        body{
            background: #A1D3F6;
        }
        .login {
            text-align: center; /*让div内部文字居中*/
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 50px 50px 100px #3683BC;
            width: 300px;
            height: 200px;
            margin: auto;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
        .login li{
            height: 40px;
            line-height: 40px;

        }
        #title{
            display: block;
            position: center;
            font-size: 20px;
            color: #263582;
            line-height: 36px;
            align-content: center;
            text-shadow: 5px 5px 5px #1a2352;
        }
        .login input{
            margin: auto;
            position: absolute;
            display: block;
            line-height: 30px;
            width: 200px;
            left: 50px;
        }
        .login button{
            margin: auto;
            position: absolute;
            display: block;
            line-height: 30px;
            text-align: center;
            left: 50px;
            width: 200px;
            background: #bfa;
            color: #05385a;
            font-size: 16px;
            font-weight: bold;
            border: #fff 1px solid;
        }
        .login button:hover{
            background: #53e354;
        }
    </style>
</head>
<body>
<form action="CheckLog.php" method="post" class="login">
    <ul>
        <li>
            <div id="title">用户登录</div>
        </li>
        <li>
            <label class="account">
                <input type="text" name="account" placeholder="请输入账号">
            </label>
        </li>
        <li>
            <label class="password">
                <input type="password" name="password" placeholder="请输入密码">
            </label>
        </li>
        <li>
            <button type="submit">登录</button>
        </li>
    </ul>



</form>
</body>
</html>
