<?php
echo $_GET['shop_id'];

include '../public/common/dbconfig.inc.php';
include '../public/common/acl.inc.php';
session_start();
$shop_id = $_GET['shop_id'];

$username = $_SESSION['username'];
$sqlUser = "select * from userdata where username='{$_SESSION['username']}'";
$ResUser = $conn->query($sqlUser);
$RowUser = $ResUser->fetch_assoc();
$user_id = $RowUser['id'];
echo"$user_id";
echo"<br>";

$sql="select *from cart where user_id=$user_id";
$res=$conn->query($sql);
$flag=0;
while ($row=$res->fetch_assoc())
{
    echo"flag=$flag";
    if($flag>=1)
    {
        break;
    }
    if(($row['shop_id']==$shop_id)&&($flag===0))
    {
        $flag++;
        echo"shopid={$row['shop_id']}";
        $id=$row['id'];

        $sqlShop="delete from cart where id= $id";
        if ($conn->query($sqlShop)) {

            header("Location:index.php");
        }

    }
}
