<?php
include '../../public/common/dbconfig.inc.php';
$name=$_POST['name'];
$id=$_POST['id'];



if($name){
    $sql="UPDATE  shopclass SET name='$name'
    WHERE id='$id'";
//    echo"$sqlUser";
    if($conn->query($sql))
    {
        echo "更新成功!<br>";
    }
    else{
        echo "error:".$sql."<br>".$conn->error;
    }
}
else{
    echo "名称不能为空";
}
echo "<a href='edit.php'>点击返回编辑页面</a>";

