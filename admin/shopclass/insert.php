<?php
include '../../public/common/dbconfig.inc.php';
$name=$_POST['name'];



$sql="INSERT INTO shopclass (name)
    VALUES ('$name')";

if($conn->query($sql))
{
    echo "添加成功<br>";
}
else{
    echo "error:".$sql."<br>".$conn->error;
}


echo "<a href='add.php'>点击返回商品添加界面</a>";
