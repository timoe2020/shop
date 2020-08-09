<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>删除订单</title>
</head>
<body>
<header>
    <?php
    include '../index.php';
    ?>
</header>
<main>
    <?php
    include '../public/common/acl.inc.php';
    include "../../public/common/dbconfig.inc.php";
    header("Content-Type: text/html;charset=utf-8");
    $id=$_GET['id'];
    if(mysqli_query($conn,"DELETE FROM orderdata WHERE id='{$id}'"))
    {
        echo"删除成功<br>";

    }
    else{
        echo "something wrong happened";
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    ?>

</main>

</body>
</html>



