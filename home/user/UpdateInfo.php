<?php

include'../public/common/dbconfig.inc.php';

//获得表单信息
$realname= $_POST['realname'];
$address= $_POST['address'];
$telephone= $_POST['telephone'];
$email= $_POST['email'];
//$user_id=$_POST['user_id'];
$id=$_POST['id'];


//更新信息
$sqlRel="UPDATE relation SET realname='$realname',address='$address',email='$email',telephone='$telephone'
WHERE id='$id'";
if($ResRel=$conn->query($sqlRel))
{
    header("Location:information.php");
}
else{
    echo "error:","$conn->error","<br>";
    echo "sql:","$sqlRel","<br>";
}
