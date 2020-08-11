
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .add-box{
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
    <div class="add-box">
    <form method="post" action="InsertInfo.php">
        <div>
            <span>真实姓名</span>
            <input type="text" name="realname">
        </div>
        <div>
            <span>收货地址</span>
            <input type="text" name="address">
        </div>
        <div>
            <span>手机号码</span>
            <input type="text" name="telephone">
        </div>
        <div>
            <span>电子邮箱</span>
            <input type="text" name="email">
        </div>
        <input type="submit" value="增加">
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
