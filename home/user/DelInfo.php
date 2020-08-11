<?php

include'../public/common/dbconfig.inc.php';

//获得表单信息
$id=$_GET['id'];



//更新信息
$sqlRel="delete from relation WHERE id='{$id}'";
if($ResRel=$conn->query($sqlRel))
{
    header("Location:information.php");

}
else{
    echo "error:","$conn->error","<br>";
    echo "sql:","$sqlRel","<br>";
}
