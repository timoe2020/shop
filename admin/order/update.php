
<?php
include '../public/common/acl.inc.php';
include '../../public/common/dbconfig.inc.php';
header("Content-Type: text/html;charset=utf-8");
$state=$_POST['state'];
$id=$_POST['id'];


if($state){
    $sqlStat="UPDATE  orderdata SET orderstat_id='$state' WHERE id='$id'";


    if($conn->query($sqlStat))
    {
        echo "更改成功<br>";
    }
    else{
        echo "error:".$sqlStat."<br>".$conn->error;
    }
}
else{
    echo "请选择状态";
}
echo "<a href='EditInfo.php'>点击返回修改页面</a>";
