<?php
include '../public/common/acl.inc.php';
include '../../public/common/dbconfig.inc.php';
header("Content-Type: text/html;charset=utf-8");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>更新商品</title>
</head>
<body>
<header>
    <?php
    include '../index.php';
    ?>
</header>
<main>
    <?php
    $name=$_POST['name'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    $upshelf=$_POST['upshelf'];
    $image=$_POST['img'];
    $brand_id=$_POST['BrandId'];
    $id=$_POST['id'];



    if($name){
        $sqlShop="UPDATE  shop SET name='$name', price='$price' ,stock='$stock',upshelf='$upshelf'
    ,image='$image',brand_id='$brand_id' WHERE id='$id'";

        if($conn->query($sqlShop))
        {
            echo "更改成功<br>";
        }
        else{
            echo "error:".$sqlShop."<br>".$conn->error;
        }
    }
    else{
        echo "名称不能为空";
    }

    ?>
</main>

</body>
</html>

