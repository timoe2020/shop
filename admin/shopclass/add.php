<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加商品</title>
</head>
<body>
<p><b>添加商品分类名称：</b></p>
<form action="insert.php" method="post">
    <table border="1px" cellspacing="0">
        <tr>
            <td>商品分类名称：</td>
            <td>
                <label>
                    <input type="text" name="name">
                </label>
            </td>
        </tr>

        <tr>
            <td>
                <input type="submit" value="提交">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
    <a href="../index.php">返回管理系统主界面</a>
</form>
</body>
</html>

