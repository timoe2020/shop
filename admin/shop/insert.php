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
    <title>Document</title>
</head>
<body>
<header>
    <?php
    include'../index.php';
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
    $class_id=$_POST['ClassId'];



    $sqlShop="INSERT INTO shop (name, price, stock, upshelf, image, brand_id,class_id)
VALUES ('$name', '$price',' $stock', '$upshelf',' $image', '$brand_id','$class_id')";
    if($conn->query($sqlShop))
    {
        echo "添加成功!<br>";
    }
    else{
        echo "error:".$sqlShop."<br>".$conn->error;
    }



    ?>
</main>
</body>
</html>

