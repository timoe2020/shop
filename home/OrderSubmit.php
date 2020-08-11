<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
include "public/common/dbconfig.inc.php";
echo"connect successfully<br>";
//得到提交的地址
$relation_id=$_POST['relation_id'];


//设定订单状态为未发货
$orderstat_id=1;


//设定时间为当前时间
$time=time();

//得到用户id
$username= $_SESSION['username'];
$sqlUser="select * from userdata where username='{$username}'";
$ResUser=$conn->query($sqlUser);
$RowUser=$ResUser->fetch_assoc();
$user_id=$RowUser['id'];

//随机生成订单号
$code=substr(time().mt_rand(),5,10);





//根据用户id查cart表得到用户所购买的所有商品的id，每件商品的数目
$sqlCart="select * from cart where user_id='{$user_id}' ";
$ResCart=$conn->query($sqlCart);
$i=0;
$SumCount=0;
$result=0;
while ($RowCart=$ResCart->fetch_assoc())
{
    $shop_id[$i++]=$RowCart['shop_id'];
    $count_all=array_count_values($shop_id);
    $count=count($count_all);
    $key=array_keys($count_all);
}
for($i=0;$i<$count;$i++)
{
    $sqlShop = "select * from shop where id='{$key[$i]}' order by id";
    $ResShop = $conn->query($sqlShop);
    $RowShop = $ResShop->fetch_assoc();
    $num=$count_all[$key[$i]];

        $sum=$RowShop['price']*$count_all[$key[$i]];
        $SumCount=$SumCount+$sum;

        //输出测试
//        echo "code:",$code,"<br>";
//        echo "user_id",$user_id,"<br>";
//        echo "shop_id",$RowShop['id'],"<br>";
//        echo "num",$num,"<br>";
//        echo "price:{$sum}<br>";
//        echo "time:",$time,"<br>";
//        echo "state_id",$orderstat_id,"<br>";
//        echo "relation_id:",$relation_id,"<br>";
//        echo "<br>";

        //插入到orderdata表中
        $sqlOrder="insert into orderdata (code, user_id, shop_id, num, price, time, orderstat_id, relation_id) VALUES 
                    ('$code','$user_id','{$RowShop['id']}','$num','$sum','$time','$orderstat_id','$relation_id')";
        if(($ResOrder=$conn->query($sqlOrder))&&($i==$count-1))
        {
            echo"提交成功";
            echo"<a href='user/myorder.php'>点击查看订单</a>";
            $result=1;

        }
        else if(!$ResOrder=$conn->query($sqlOrder)){
            echo "error:",$conn->error,"<br>","sql:",$sqlOrder,"<br>";
        }
}

if($result==1)
{
    $sqlClear="delete from cart where user_id=$user_id";
    if(!$ResClear=$conn->query($sqlClear))
    {
        echo "error:",$conn->error,"<br>","sql:",$sqlClear ,"<br>";
    }
}

//根据每件商品的id查shop表查到商品的价格
?>



