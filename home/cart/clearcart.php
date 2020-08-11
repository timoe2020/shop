<?php
include "../public/common/dbconfig.inc.php";
$sqlCart = "select * from cart where user_id='21' ";
$ResCart = $conn->query($sqlCart);
$i=0;
while ($RowCart = $ResCart->fetch_assoc()) {
    $shop_id[$i++]=$RowCart['shop_id'];
    $count_all=array_count_values($shop_id);
    $count=count($count_all);
    $key=array_keys($count_all);
}
print_r($shop_id);
for($i=0;$i<$count;$i++)
{
    $sqlShop = "select * from shop where id='{$key[$i]}'";
    $ResShop = $conn->query($sqlShop);
    $RowShop = $ResShop->fetch_assoc();
    echo "<br>";
    echo "<td>{$RowShop['name']}</td>";
    echo"&nbsp";
    echo "<td>{$RowShop['price']}</td>";
    echo"&nbsp";
    echo "<td>{$RowShop['stock']}</td>";
    echo"&nbsp";
    echo "<td>{$count_all[$key[$i]]}</td>";
    echo"&nbsp";
    echo "<td><a href='decrease.php'>删除</a></td>";
    echo "<br>";
}


