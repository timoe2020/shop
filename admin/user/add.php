<?php
include '../public/common/acl.inc.php';
header("Content-Type: text/html;charset=utf-8");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加用户</title>
</head>
<body>
<header>
    <?php
    include'../index.php';
    ?>
</header>
<main>
    <p><b>添加用户：</b></p>
    <form action="insert.php" method="post" target="_self">
        <table border="1px" cellspacing="0">
            <tr>
                <td>用户名：</td>
                <td>
                    <label>
                        <input type="text" name="username">
                    </label>
                </td>
            </tr>
            <tr>
                <td>密码：</td>
                <td>
                    <label>
                        <input type="password" name="password">
                    </label>
                </td>
            </tr>
            <tr>
                <td>确认密码：</td>
                <td>
                    <label>
                        <input type="password" name="repassword">
                    </label>
                </td>
            </tr>
            <tr>
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
