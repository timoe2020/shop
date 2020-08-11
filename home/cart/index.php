
<?php
session_start();
include "../public/common/dbconfig.inc.php";
$sqlUser="select * from userdata where username='{$_SESSION['username']}'";
$ResUser=$conn->query($sqlUser);
$RowUser=$ResUser->fetch_assoc();
$user_id= $RowUser['id'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的购物车</title>
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <link rel="stylesheet" href="../public/css/reset.css">
    <style>
        body{
            background: rgb(245,245,245);
        }
        header{
            background: white;
            height: 100px;
            border-bottom: 2px rgb(255,103,0) solid;
        }
        .car-logo{
            display: inline-block;
            font-size: 25px;
            width: 50px;
            background: rgb(255,103,0);
            color: white;
            text-align: center;
            padding: 10px 0;
            margin: 25px 40px 20px 150px;

        }
        .car-logo a{
            color: white;
        }
        .cart-title{
            font-size: 30px;
            font-family: "Microsoft YaHei UI", serif;
        }
        .cart-tips{
            color: darkgray;
            font-family: "Microsoft YaHei UI", serif;
        }
        .menu-box{
            float: right;
            margin:45px 200px 0 0;
        }
        .cart-user{
            display: inline-block;
            color: darkgray;
            padding-right: 20px;
            float: left;
        }
        .user-list{
            display: none;
        }
        .list-member{
            margin: 20px 0;
        }
        .cart-user:hover{
            /*background: #f3eded;*/
        }
        .cart-user :hover .user-list{
            padding: 10px;
            display: block;
            position: absolute;
            background: white;
            z-index: 22;
            box-shadow:  0 10px 10px #CEE2F5;

        }


        .line{
            display: inline-block;
            float: left;
            color: darkgray;

        }
        .cart-order{
            display: inline-block;
            float: left;
            padding-left: 20px;
        }

         a{
            color: darkgray;
        }

        #content{
            background: rgb(245,245,245);
        }

        table{
            width: 80%;
            display: inline-block;
            background: white;
            text-align: center;
            margin: 20px 10%;
        }
        .table-title{
            height: 30px;
        }
        table td{
            border-bottom: 1px solid #d7d7d7;
            width: 200px;
            height: 30px;
            padding: 15px;

        }
        table tr{
            width: 100%;
            /*height: 50px;*/
        }
        table a:hover{
            color: red;

        }

        a:hover{
            color: orange;
        }
        .number{
            font-size: 16px;
            color: red;
        }
        .account{
            background: #e73939;
            font-size: 20px;
            font-weight: bolder;

        }
        .account a{
            color: white;
        }
        .account a:hover{
            color: #CEE2F5;
        }


    </style>
</head>
<body>

<header>
    <span class="car-logo"><a href="../index.php"><i class="fa fa-simplybuilt" aria-hidden="true"></i> </a></span>
    <span class="cart-title">
        我的购物车
    </span>
    <span class="cart-tips">
        温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算
    </span>
        <div class="menu-box">
            <div class="cart-user">
                <ul>
                    <li>
                        <?php
                        echo "<a href='../user/index.php'>".$_SESSION['username']."<i class='fa fa-chevron-down' aria-hidden='true'></i></a>";
                        ?>
                    </li>
                    <li>
                        <ul class="user-list">
                            <li class="list-member"><a href="../user/index.php">个人中心</a></li>
                            <li class="list-member"><a href="../login/logout.php">退出登录</a></li>
                        </ul>
                    </li>

                </ul>
            </div>

            <div class="line">|</div>
            <div class="cart-order"><a href="../user/information.php">我的订单</a></div>
        </div>
</header>

<div id="content">


    <div>
        <table>
            <tr class="table-title">
                <td>商品名称</td>
                <td>单价</td>
                <td>数量</td>
                <td>库存</td>
                <td>增加数量</td>
                <td>减少数量</td>
                <td>小计</td>
                <td>操作</td>


            </tr>
            <?php
            $sqlCart="select * from cart where user_id='{$user_id}' ";
            $ResCart=$conn->query($sqlCart);
            $i=0;
            $SumCount=0;
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
                //根据商品id找商品的库存
                $stock=$RowShop['stock'];
                //判断是否超过库存
                if($num>=$stock)
                {
                    $sum=$RowShop['price']*$count_all[$key[$i]];
                    $SumCount=$SumCount+$sum;
                    echo "<tr>";
                    echo "<td>{$RowShop['name']}</td>";
                    echo "<td>{$RowShop['price']}</td>";
                    echo "<td>{$num}</td>";
                    echo "<td>{$RowShop['stock']}</td>";
                    echo "<td style='color: lightgray'>增加</td>";
                    echo "<td><a href='decrease.php?shop_id={$key[$i]}'>减少</a></td>";

                    echo "<td>{$sum}</td>";
                    echo "<td><a href='DeleteCart.php?shop_id={$key[$i]}'>删除</a></td>";
                    echo "<tr>";
                }
                else{
                $sum=$RowShop['price']*$count_all[$key[$i]];
                $SumCount=$SumCount+$sum;
                echo "<tr>";
                echo "<td>{$RowShop['name']}</td>";
                echo "<td>{$RowShop['price']}</td>";
                echo "<td>{$num}</td>";
                echo "<td>{$RowShop['stock']}</td>";
                echo "<td><a href='increase.php?shop_id={$key[$i]}'>增加</a></td>";
                echo "<td><a href='decrease.php?shop_id={$key[$i]}'>减少</a></td>";
                echo "<td>{$sum}</td>";
                echo "<td><a href='DeleteCart.php?shop_id={$key[$i]}'>删除</a></td>";

                echo "<tr>";
                }
            }
            ?>
            <tr>

                <td colspan="6">总金额</td>
                <td class="number"><?php echo $SumCount?> </td>
                <td  class="account"><a href="../account.php">去结算</a></td>
            </tr>
    </table>
    </div>
</div>

<footer>

</footer>

</body>
</html>
