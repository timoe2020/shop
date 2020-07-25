<?php
include'../../public/common/dbconfig.inc.php';
$id=$_GET['id'];
$sql="DELETE FROM shopclass WHERE id='{$id}'";
if($conn->query($sql))
{
    echo "删除成功！";
    echo"<a href='index.php'>点击返回商品分类主界面</a>";
}
else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

